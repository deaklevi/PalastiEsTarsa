<template>
  <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
    <div v-if="loading" class="mt-10 text-gray-500">Betöltés...</div>

    <div v-else-if="filteredTombstones.length === 0" class="mt-10 text-gray-400 italic">
      Nincs megjeleníthető sírkő ebben a csoportban.
    </div>

    <div v-else class="flex flex-wrap justify-center gap-5 max-w-[1500px]">
      <div 
        v-for="(item, index) in filteredTombstones" 
        :key="item.id" 
        class="w-40 max-[380px]:w-[40%] md:w-52 cursor-pointer group" 
        @click="openModal(item, index)"
      >
        <div class="relative w-full h-36 md:h-40 flex items-center justify-center bg-white overflow-hidden">
          <img 
            :src="baseUrl + item.image_url" 
            :alt="item.name" 
            class="min-w-full max-h-full object-contain border-2 border-orange-600 transition-transform duration-300 group-hover:scale-105" 
          />
        </div>
        <h5 class="text-sm text-center break-words mt-2">
          <span class="text-orange-600 font-semibold">{{ item.tombstone_id }}</span> | {{ item.name }}
        </h5>
      </div>
    </div>

    <Teleport to="body">
      <div 
        v-if="selectedItem" 
        class="fixed inset-0 bg-black/80 flex items-start justify-center z-[9999] w-screen h-screen pt-4 backdrop-blur-sm"
        @click="closeModal"
      >
        <div 
          class="relative w-11/12 lg:w-2/3 h-min lg:bg-neutral-800 lg:border-2 lg:border-orange-600 p-4 max-w-[800px] flex flex-col" 
          @click.stop
        >
          <button 
            @click="closeModal" 
            class="absolute -top-2 right-0 lg:top-1 lg:right-5 text-white text-5xl font-light hover:text-orange-600 transition-colors z-[10000]"
          >
            &times;
          </button>

          <div class="text-center flex-1 flex flex-col">
            <h2 class="text-xl font-bold text-orange-600 mb-2">{{ selectedItem.name }}</h2>
            <img 
              :src="baseUrl + selectedItem.image_url" 
              :alt="selectedItem.name" 
              class="mx-auto lg:border-none border-2 border-orange-600 max-h-[70vh] object-contain mb-4" 
            />
            
            <div class="mt-2 text-white text-xs leading-relaxed overflow-y-auto max-h-[20vh] px-2 custom-scrollbar">
              <span class="text-orange-600 font-semibold">{{ selectedItem.tombstone_id }}</span> | {{ selectedItem.description }}
            </div>
          </div>

          <div class="flex justify-center mt-6 gap-4">
            <button @click="prevItem" class="flex-1 max-w-[120px] p-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-colors">
              Balra
            </button>
            <button @click="nextItem" class="flex-1 max-w-[120px] p-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-colors">
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
import { useTombstone } from '@stores/TombstoneStore.mjs'

const props = defineProps({
  group: {
    type: String,
    required: true
  }
})

// Store kezelés
const store = useTombstone()
const { tombstones } = storeToRefs(store)

// Állapotok
const loading = ref(true)
const selectedItem = ref(null)
const currentIndex = ref(0)
const baseUrl = import.meta.env.VITE_APP_URL

// Szűrt lista
const filteredTombstones = computed(() => 
  tombstones.value.filter(item => item.group === props.group)
)

// Funkciók
const openModal = (item, index) => {
  currentIndex.value = index
  selectedItem.value = item
  toggleScroll(true)
}

const closeModal = () => {
  selectedItem.value = null
  toggleScroll(false)
}

const toggleScroll = (isFixed) => {
  const action = isFixed ? 'hidden' : ''
  document.body.style.overflow = action
  document.documentElement.style.overflow = action
}

const nextItem = () => {
  currentIndex.value = (currentIndex.value + 1) % filteredTombstones.value.length
  selectedItem.value = filteredTombstones.value[currentIndex.value]
}

const prevItem = () => {
  currentIndex.value = (currentIndex.value - 1 + filteredTombstones.value.length) % filteredTombstones.value.length
  selectedItem.value = filteredTombstones.value[currentIndex.value]
}

const handleArrowKeys = (event) => {
  if (event.key === 'ArrowRight') nextItem()
  if (event.key === 'ArrowLeft') prevItem()
  if (event.key === 'Escape') closeModal()
}

// Lifecycle & Watchers
watch(selectedItem, (newVal) => {
  if (newVal) {
    window.addEventListener('keydown', handleArrowKeys)
  } else {
    window.removeEventListener('keydown', handleArrowKeys)
  }
})

onMounted(async () => {
  if (tombstones.value.length === 0) {
    try {
      await store.getTombstones()
    } catch (error) {
      console.error('Hiba a betöltéskor:', error)
    }
  }
  loading.value = false
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleArrowKeys)
  toggleScroll(false) // Biztonsági takarítás
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