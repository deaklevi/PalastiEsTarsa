<template>
  <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
    <div v-if="loading" class="mt-10 text-gray-500 animate-pulse">Betöltés...</div>

    <div v-else-if="filteredArchitectures.length === 0" class="mt-10 text-gray-400 italic">
      Nincs megjeleníthető architektúra ebben a csoportban.
    </div>

    <div v-else class="flex flex-wrap justify-center gap-5 max-w-[1500px]">
      <div 
        v-for="(item, index) in filteredArchitectures" 
        :key="item.id" 
        class="w-40 max-[380px]:w-[40%] md:w-52 cursor-pointer group" 
        @click="openModal(item, index)"
      >
        <div class="relative w-full h-36 md:h-40 flex items-center justify-center bg-white overflow-hidden shadow-sm border-2 border-orange-600/20 group-hover:border-orange-600 transition-all">
          <img 
            :src="baseUrl + item.image_url" 
            :alt="item.name" 
            class="min-w-full max-h-full object-contain transition-transform duration-300 group-hover:scale-110" 
          />
        </div>
        <h5 class="text-sm text-center break-words mt-2">
          <span class="text-orange-600 font-semibold">{{ item.order }}</span> | {{ item.name }}
        </h5>
      </div>
    </div>

    <Teleport to="body">
      <div 
        v-if="selectedItem" 
        class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-start justify-center z-[9999] w-screen h-screen pt-4"
        @click="closeModal"
      >
        <div 
          class="relative w-11/12 lg:w-2/3 h-min lg:bg-neutral-900 lg:border-2 lg:border-orange-600 p-4 max-w-[800px] flex flex-col shadow-2xl" 
          @click.stop
        >
          <button 
            @click="closeModal" 
            class="absolute -top-10 right-0 lg:top-2 lg:right-4 text-white hover:text-orange-600 text-5xl font-light transition-colors"
          >
            &times;
          </button>

          <div class="text-center flex-1">
            <h2 class="text-xl font-bold text-orange-600 mb-3 uppercase tracking-wide">
              {{ selectedItem.name }}
            </h2>
            
            <div class="bg-white p-2 rounded-sm mb-4">
              <img 
                :src="baseUrl + selectedItem.image_url" 
                :alt="selectedItem.name" 
                class="mx-auto max-h-[65vh] object-contain" 
              />
            </div>

            <p class="text-white text-sm leading-relaxed overflow-y-auto max-h-[20vh] px-4 custom-scrollbar">
              <span class="text-orange-500 font-bold">{{ selectedItem.group }}</span> – {{ selectedItem.name }}
            </p>
          </div>

          <div class="flex justify-center mt-6 gap-4">
            <button @click="prevItem" class="flex-1 max-w-[140px] py-2 bg-orange-600 hover:bg-orange-700 text-white rounded font-medium transition-all active:scale-95">
              &larr; Balra
            </button>
            <button @click="nextItem" class="flex-1 max-w-[140px] py-2 bg-orange-600 hover:bg-orange-700 text-white rounded font-medium transition-all active:scale-95">
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
import { useArchitecture } from '@stores/ArchitectureStore.mjs'

const props = defineProps({
  group: {
    type: String,
    required: true,
  },
})

// Store inicializálás
const store = useArchitecture()
const { architectures } = storeToRefs(store)

// Reaktív állapotok
const loading = ref(true)
const selectedItem = ref(null)
const currentIndex = ref(0)
const baseUrl = import.meta.env.VITE_APP_URL

// Szűrt lista
const filteredArchitectures = computed(() => 
  architectures.value.filter(item => item.group === props.group)
)

// Metódusok
const openModal = (item, index) => {
  currentIndex.value = index
  selectedItem.value = item
  document.body.style.overflow = 'hidden'
}

const closeModal = () => {
  selectedItem.value = null
  document.body.style.overflow = ''
}

const nextItem = () => {
  currentIndex.value = (currentIndex.value + 1) % filteredArchitectures.value.length
  selectedItem.value = filteredArchitectures.value[currentIndex.value]
}

const prevItem = () => {
  currentIndex.value = (currentIndex.value - 1 + filteredArchitectures.value.length) % filteredArchitectures.value.length
  selectedItem.value = filteredArchitectures.value[currentIndex.value]
}

const handleArrowKeys = (event) => {
  if (event.key === 'ArrowRight') nextItem()
  if (event.key === 'ArrowLeft') prevItem()
  if (event.key === 'Escape') closeModal()
}

// Figyelők és Életciklus
watch(selectedItem, (val) => {
  if (val) {
    window.addEventListener('keydown', handleArrowKeys)
  } else {
    window.removeEventListener('keydown', handleArrowKeys)
  }
})

onMounted(async () => {
  if (architectures.value.length === 0) {
    try {
      await store.getArchitectures()
    } catch (error) {
      console.error('Hiba az adatok betöltésekor:', error)
    }
  }
  loading.value = false
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleArrowKeys)
  document.body.style.overflow = ''
})
</script>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 5px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.05);
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: #ea580c;
  border-radius: 10px;
}
</style>