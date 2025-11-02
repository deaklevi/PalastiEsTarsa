<template>
  <div class="w-40 md:w-52 cursor-pointer" @click="openModal">
    <img
      :src="'http://192.168.1.83:8000' + item.image_url"
      :alt="item.name"
      class="w-full border-2 border-orange-600"
    />
    <h5 class="text-sm text-center break-words">
      <span class="text-orange-600 font-semibold">{{ item.tombstone_id }}</span> |
      {{ item.name }}
    </h5>
  </div>

  <!-- Modal -->
  <div
    v-if="isOpen"
    class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-[9999] w-screen h-screen overflow-hidden"
    @wheel.prevent
    @touchmove.prevent
  >
    <!-- Close button -->
    <button
      @click="closeModal"
      class="absolute top-16 right-5 text-white text-5xl font-bold z-[10000]"
    >
      &times;
    </button>

    <!-- Content -->
    <div
      class="relative rounded-2xl p-6 w-11/12 md:w-2/3 max-h-[90vh] overflow-auto"
      @click.stop
    >
      <div class="text-center">
        <h2 class="text-xl font-bold text-orange-600 mb-4">{{ item.name }}</h2>
        <img
          :src="'http://192.168.1.83:8000' + item.image_url"
          :alt="item.name"
          class="mx-auto border-2 border-orange-600 max-h-[60vh] object-contain"
        />
        <p class="mt-4 text-white text-base leading-relaxed">
          <span class="text-orange-600 font-semibold">{{ item.tombstone_id }}</span> | {{ item.description }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  },
  data() {
    return {
      isOpen: false
    }
  },
  methods: {
    openModal() {
      this.isOpen = true
      document.body.style.overflow = 'hidden'
      document.documentElement.style.overflow = 'hidden'
    },
    closeModal() {
      this.isOpen = false
      document.body.style.overflow = ''
      document.documentElement.style.overflow = ''
    }
  }
}
</script>
