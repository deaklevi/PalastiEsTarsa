<template>
  <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
    <!-- Betöltés -->
    <div v-if="loading" class="mt-10 text-gray-500">Betöltés...</div>

    <!-- Üres állapot -->
    <div v-else-if="filteredTombstones.length === 0" class="mt-10 text-gray-400 italic">
      Nincs megjeleníthető sírkő ebben a csoportban.
    </div>

    <!-- Tartalom -->
    <div v-else class="mt-5 md:mt-10 flex flex-wrap justify-center gap-5 max-w-[1500px]" >
      <div v-for="item in filteredTombstones" :key="item.id" class="w-40 md:w-52 cursor-pointer" @click="openModal(item)" >
        <div class="relative w-full h-36 md:h-40 flex items-center justify-center bg-white" >
          <img :src="baseUrl + item.image_url" :alt="item.name" class="min-w-full max-h-full object-contain border-2 border-orange-600" />
        </div>
        <h5 class="text-sm text-center break-words">
          <span class="text-orange-600 font-semibold">{{ item.tombstone_id }}</span> | {{ item.name }}
        </h5>
      </div>
    </div>

    <!-- Modal -->
    <div v-if="selectedItem" class="fixed inset-0 bg-black bg-opacity-80 flex items-start justify-center z-[9999] w-screen h-screen pt-10 md:pt-20">
      <div class="relative w-11/12 lg:w-2/3 max-h-[90vh] lg:bg-neutral-800 lg:border-2 lg:border-orange-600 p-5 max-w-[800px] flex flex-col" @click.stop>
        <!-- Bezárás -->
        <button @click="closeModal" class="absolute -top-3 right-0 lg:top-1 lg:right-5 text-white text-5xl font-bold z-[10000]">&times;</button>

        <!-- Tartalom -->
        <div class="text-center flex-1 flex flex-col">
          <h2 class="text-xl font-bold text-orange-600 mb-4">{{ selectedItem.name }}</h2>
          <img :src="baseUrl + selectedItem.image_url" :alt="selectedItem.name" class="mx-auto lg:border-none border-2 border-orange-600 max-h-[40vh] object-contain mb-4" />
          <!-- Scrollozható leírás -->
          <p class="mt-2 text-white text-base leading-relaxed overflow-auto max-h-[30vh] touch-auto" style="-webkit-overflow-scrolling: touch;">
            <span class="text-orange-600 font-semibold">{{ selectedItem.tombstone_id }}</span> | {{ selectedItem.description }}
          </p>
        </div>

        <!-- Nyilak szöveggel, egyforma széles gombok -->
        <div class="flex justify-center mt-6">
          <div class="flex w-full max-w-xs">
            <button @click="prevItem" class="flex-1 flex justify-center gap-2 p-2 bg-orange-600 text-white rounded lg:hover:bg-orange-700 transition-colors duration-300 mx-1" >
              Balra
            </button>
            <button @click="nextItem" class="flex-1 flex justify-center gap-2 p-2 bg-orange-600 text-white rounded lg:hover:bg-orange-700 transition-colors duration-300 mx-1" >
              Jobbra
            </button>
          </div>
        </div>

      </div>
    </div>
    
  </div>
</template>

<script>
import { mapState } from 'pinia'
import { useTombstone } from '@stores/TombstoneStore.mjs'

export default {
  props: {
    group: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      loading: true,
      selectedItem: null,
      baseUrl: import.meta.env.VITE_APP_URL,
      currentIndex: 0
    }
  },
  computed: {
    ...mapState(useTombstone, ['tombstones']),
    filteredTombstones() {
      return this.tombstones.filter(item => item.group === this.group)
    }
  },
  async mounted() {
    const store = useTombstone()

    if (store.tombstones.length === 0) {
      try {
        await store.getTombstones()
      } catch (error) {
        console.error('Nem sikerült betölteni a sírköveket:', error)
      }
    }

    this.loading = false
  },
  watch: {
    selectedItem(val) {
      if (val) {
        window.addEventListener('keydown', this.handleArrowKeys)
      } else {
        window.removeEventListener('keydown', this.handleArrowKeys)
      }
    }
  },
  methods: {
    openModal(item) {
      this.currentIndex = this.filteredTombstones.findIndex(i => i.id === item.id)
      this.selectedItem = item
      document.body.style.overflow = 'hidden'
      document.documentElement.style.overflow = 'hidden'
    },
    closeModal() {
      this.selectedItem = null
      document.body.style.overflow = ''
      document.documentElement.style.overflow = ''
    },
    handleArrowKeys(event) {
      if (!this.selectedItem) return

      if (event.key === 'ArrowRight') {
        this.nextItem()
      } else if (event.key === 'ArrowLeft') {
        this.prevItem()
      }
    },
    nextItem() {
      this.currentIndex = (this.currentIndex + 1) % this.filteredTombstones.length
      this.selectedItem = this.filteredTombstones[this.currentIndex]
    },
    prevItem() {
      this.currentIndex =
        (this.currentIndex - 1 + this.filteredTombstones.length) % this.filteredTombstones.length
      this.selectedItem = this.filteredTombstones[this.currentIndex]
    }
  }
}
</script>
