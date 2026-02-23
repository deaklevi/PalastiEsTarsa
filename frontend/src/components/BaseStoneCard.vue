<template>
  <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
    <div v-if="loading" class="mt-10 text-gray-500 animate-pulse">Betöltés...</div>

    <div v-else-if="filteredStones.length === 0" class="mt-10 text-gray-400 italic">
      Nincs megjeleníthető kő anyag ebben a csoportban.
    </div>

    <div v-else class="flex flex-wrap justify-center gap-5 max-w-[1500px]">
      <div 
        v-for="(item, index) in filteredStones" 
        :key="item.id" 
        class="w-40 max-[380px]:w-[40%] md:w-52 cursor-pointer group" 
        @click="openModal(item, index)"
      >
        <div class="relative w-full h-36 md:h-40 flex items-center justify-center bg-white overflow-hidden border-2 border-orange-600/20 group-hover:border-orange-600 transition-colors duration-300 shadow-sm">
          <img 
            :src="baseUrl + item.image_url" 
            :alt="item.name" 
            class="min-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-110" 
          />
        </div>
        <h5 class="text-sm text-center break-words mt-2 font-medium">
          {{ item.name }}
        </h5>
      </div>
    </div>

    <Teleport to="body">
      <div 
        v-if="selectedItem" 
        class="fixed inset-0 bg-black/90 backdrop-blur-sm flex items-center justify-center z-[9999] p-4"
        @click="closeModal"
      >
        <div 
          class="relative w-full max-w-[800px] bg-neutral-900 lg:border-2 lg:border-orange-600 p-4 flex flex-col shadow-2xl" 
          @click.stop
        >
          <button 
            @click="closeModal" 
            class="absolute -top-12 right-0 lg:top-2 lg:right-4 text-white hover:text-orange-500 text-5xl font-light transition-colors"
          >
            &times;
          </button>

          <div class="flex-1 flex flex-col items-center">
            <h2 class="text-xl font-bold text-orange-600 mb-3">{{ selectedItem.name }}</h2>
            
            <div class="w-full bg-white p-1 mb-4 rounded-sm">
              <img 
                :src="baseUrl + selectedItem.image_url" 
                :alt="selectedItem.name" 
                class="mx-auto max-h-[60vh] object-contain" 
              />
            </div>

            <div class="w-full text-white text-sm space-y-2 px-2 custom-scrollbar overflow-y-auto max-h-[20vh]">
              <p><span class="text-orange-600 font-semibold">Anyagnév:</span> {{ selectedItem.name }}</p>
              <p><span class="text-orange-600 font-semibold">Származás:</span> {{ selectedItem.origin }}</p>
              <p><span class="text-orange-600 font-semibold">Szín:</span> {{ selectedItem.color }}</p>
            </div>
          </div>

          <div class="flex justify-center gap-4 mt-6">
            <button @click="prevItem" class="flex-1 max-w-[150px] py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-all active:scale-95 shadow-lg">
              &larr; Balra
            </button>
            <button @click="nextItem" class="flex-1 max-w-[150px] py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-all active:scale-95 shadow-lg">
              Jobbra &rarr;
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
import { useStone } from '@stores/StoneStore.mjs'

const props = defineProps({
  group: {
    type: String,
    required: true,
  }
})

// Store és reaktív adatok
const store = useStone()
const { stones } = storeToRefs(store)

const loading = ref(true)
const selectedItem = ref(null)
const currentIndex = ref(0)
const baseUrl = import.meta.env.VITE_APP_URL

// Szűrt lista
const filteredStones = computed(() => 
  stones.value.filter(item => item.group === props.group)
)

// Görgetés kezelő
const toggleScroll = (isLocked) => {
  const action = isLocked ? 'hidden' : ''
  document.body.style.overflow = action
  document.documentElement.style.overflow = action
}

// Interakciók
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
  currentIndex.value = (currentIndex.value + 1) % filteredStones.value.length
  selectedItem.value = filteredStones.value[currentIndex.value]
}

const prevItem = () => {
  currentIndex.value = (currentIndex.value - 1 + filteredStones.value.length) % filteredStones.value.length
  selectedItem.value = filteredStones.value[currentIndex.value]
}

const handleKeyDown = (e) => {
  if (e.key === 'ArrowRight') nextItem()
  if (e.key === 'ArrowLeft') prevItem()
  if (e.key === 'Escape') closeModal()
}

// Watchers & Lifecycle
watch(selectedItem, (newVal) => {
  if (newVal) window.addEventListener('keydown', handleKeyDown)
  else window.removeEventListener('keydown', handleKeyDown)
})

onMounted(async () => {
  if (stones.value.length === 0) {
    try {
      await store.getStones()
    } catch (error) {
      console.error('API hiba a kövek betöltésekor:', error)
    }
  }
  loading.value = false
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleKeyDown)
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