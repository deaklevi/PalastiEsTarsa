<template>
  <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
    <div v-if="loading" class="mt-10 text-gray-500 animate-pulse">Betöltés...</div>

    <div v-else-if="filteredAccessories.length === 0" class="mt-10 text-gray-400 italic">
      Nincs megjeleníthető kiegészítő ebben a csoportban.
    </div>

    <div v-else class="flex flex-wrap justify-center gap-5 max-w-[1500px]">
      <div 
        v-for="(item, index) in filteredAccessories" 
        :key="item.id" 
        class="w-40 max-[380px]:w-[40%] md:w-52 cursor-pointer group" 
        @click="openModal(item, index)"
      >
        <div class="relative w-full h-36 md:h-40 flex items-center justify-center bg-white overflow-hidden border-2 border-orange-600/30 group-hover:border-orange-600 transition-all shadow-sm">
          <img 
            :src="baseUrl + item.image_url" 
            :alt="item.name" 
            class="min-w-full max-h-full object-contain transition-transform duration-300 group-hover:scale-105" 
          />
        </div>
        <h5 class="text-sm text-center break-words mt-2">
          <span class="text-orange-600 font-semibold">{{ item.accessory_id }}</span> | {{ item.name }}
        </h5>
      </div>
    </div>

    <Teleport to="body">
      <div 
        v-if="selectedItem" 
        class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-start justify-center z-[9999] w-screen h-screen pt-4 overflow-y-auto"
        @click="closeModal"
      >
        <div 
          class="relative w-11/12 lg:w-2/3 h-min lg:bg-neutral-900 lg:border-2 lg:border-orange-600 p-4 max-w-[800px] flex flex-col my-auto shadow-2xl" 
          @click.stop
        >
          <button 
            @click="closeModal" 
            class="absolute -top-12 right-0 lg:top-2 lg:right-4 text-white text-5xl font-light hover:text-orange-600 transition-colors"
          >
            &times;
          </button>

          <div class="flex-1 flex flex-col">
            <h2 class="text-center text-xl font-bold text-orange-600 mb-2 uppercase tracking-tight">
              {{ selectedItem.name }}
            </h2>
            
            <div class="bg-white p-1 rounded-sm shadow-inner mb-4">
              <img 
                :src="baseUrl + selectedItem.image_url" 
                :alt="selectedItem.name" 
                class="mx-auto max-h-[60vh] object-contain" 
              />
            </div>

            <div class="mt-2 text-white text-xs leading-relaxed overflow-y-auto max-h-[30vh] mx-auto w-full sm:max-w-md custom-scrollbar space-y-1">
              <p><span class="text-orange-500 font-semibold">Azonosító:</span> {{ selectedItem.accessory_id }}</p>
              <p><span class="text-orange-500 font-semibold">Típus neve:</span> {{ selectedItem.type }}</p>
              <p><span class="text-orange-500 font-semibold">Alkalmazott méretek:</span> {{ selectedItem.size }}</p>
              <p><span class="text-orange-500 font-semibold">Ajánlott kőtípus:</span> {{ selectedItem.recommended_type }}</p>
              <p><span class="text-orange-500 font-semibold">Gyártási technológia:</span> {{ selectedItem.manufacturing_technology }}</p>
            </div>
          </div>

          <div class="flex justify-center mt-6 gap-3">
            <button @click="prevItem" class="flex-1 max-w-[120px] py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-all active:scale-95 shadow-lg">
              Balra
            </button>
            <button @click="nextItem" class="flex-1 max-w-[120px] py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-all active:scale-95 shadow-lg">
              Jobbra
            </button>
          </div>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted, watch } from 'vue'
import { storeToRefs } from 'pinia'
import { useAccessory } from '@stores/AccessoryStore.mjs'

const props = defineProps({
  group: {
    type: String,
    required: true,
  }
})

// Store
const store = useAccessory()
const { accessories } = storeToRefs(store)

// State
const loading = ref(true)
const selectedItem = ref(null)
const currentIndex = ref(0)
const baseUrl = import.meta.env.VITE_APP_URL

// Computed
const filteredAccessories = computed(() => 
  accessories.value.filter(item => item.group === props.group)
)

// Helpers
const toggleScroll = (isLocked) => {
  const style = isLocked ? 'hidden' : ''
  document.body.style.overflow = style
  document.documentElement.style.overflow = style
}

// Methods
const openModal = (item, index) => {
  currentIndex.value = index
  selectedItem.value = item
  toggleScroll(true)
}

const closeModal = () => {
  selectedItem.value = null
  toggleScroll(false)
}

const nextItem = () => {
  currentIndex.value = (currentIndex.value + 1) % filteredAccessories.value.length
  selectedItem.value = filteredAccessories.value[currentIndex.value]
}

const prevItem = () => {
  currentIndex.value = (currentIndex.value - 1 + filteredAccessories.value.length) % filteredAccessories.value.length
  selectedItem.value = filteredAccessories.value[currentIndex.value]
}

const handleArrowKeys = (event) => {
  if (event.key === 'ArrowRight') nextItem()
  if (event.key === 'ArrowLeft') prevItem()
  if (event.key === 'Escape') closeModal()
}

// Lifecycle & Watchers
watch(selectedItem, (newVal) => {
  if (newVal) window.addEventListener('keydown', handleArrowKeys)
  else window.removeEventListener('keydown', handleArrowKeys)
})

onMounted(async () => {
  if (accessories.value.length === 0) {
    try {
      await store.getAccessories()
    } catch (error) {
      console.error('API hiba:', error)
    }
  }
  loading.value = false
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleArrowKeys)
  toggleScroll(false)
})
</script>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: #ea580c;
  border-radius: 10px;
}
</style>