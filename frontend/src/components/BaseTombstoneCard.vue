<template>
  <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
    <!-- Betöltés -->
    <div v-if="loading" class="mt-10 text-gray-500">Betöltés...</div>

    <!-- Üres állapot -->
    <div v-else-if="filteredTombstones.length === 0" class="mt-10 text-gray-400 italic">
      Nincs megjeleníthető sírkő ebben a csoportban.
    </div>

    <!-- Tartalom -->
    <div
      v-else
      class="mt-5 md:mt-10 flex flex-wrap justify-center gap-5 max-w-[1500px]"
    >
      <div
        v-for="item in filteredTombstones"
        :key="item.id"
        class="w-40 md:w-52 cursor-pointer"
        @click="openModal(item)"
      >
        <img
          :src="baseUrl + item.image_url"
          :alt="item.name"
          class="w-full border-2 border-orange-600"
        />
        <h5 class="text-sm text-center break-words">
          <span class="text-orange-600 font-semibold">{{ item.tombstone_id }}</span> |
          {{ item.name }}
        </h5>
      </div>
    </div>

    <!-- Modal -->
    <div
      v-if="selectedItem"
      class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-[9999] w-screen h-screen overflow-hidden"
      @wheel.prevent
      @touchmove.prevent
    >
      <button
        @click="closeModal"
        class="absolute top-16 right-5 text-white text-5xl font-bold z-[10000]"
      >
        &times;
      </button>

      <div
        class="relative rounded-2xl p-6 w-11/12 md:w-2/3 max-h-[90vh] overflow-auto"
        @click.stop
      >
        <div class="text-center">
          <h2 class="text-xl font-bold text-orange-600 mb-4">{{ selectedItem.name }}</h2>
          <img
            :src="baseUrl + selectedItem.image_url"
            :alt="selectedItem.name"
            class="mx-auto border-2 border-orange-600 max-h-[60vh] object-contain"
          />
          <p class="mt-4 text-white text-base leading-relaxed">
            <span class="text-orange-600 font-semibold">{{ selectedItem.tombstone_id }}</span> |
            {{ selectedItem.description }}
          </p>
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
      baseUrl: 'http://192.168.1.83:8000'
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
  methods: {
    openModal(item) {
      this.selectedItem = item
      document.body.style.overflow = 'hidden'
      document.documentElement.style.overflow = 'hidden'
    },
    closeModal() {
      this.selectedItem = null
      document.body.style.overflow = ''
      document.documentElement.style.overflow = ''
    }
  }
}
</script>
