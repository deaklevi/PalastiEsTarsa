<template>
  <div class="relative w-full max-w-3xl mx-auto overflow-hidden">
    <!-- Slide képek -->
    <div class="relative w-full h-64 sm:h-80 md:h-96">
      <transition-group name="fade" tag="div">
        <img
          v-for="(image, index) in images"
          :key="index"
          v-show="currentIndex === index"
          :src="image"
          class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
        />
      </transition-group>
    </div>

    <!-- Oldalsó nyilak -->
    <button
      @click="prevSlide"
      class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 text-white p-2 rounded-full hover:bg-opacity-50"
    >
      ‹
    </button>
    <button
      @click="nextSlide"
      class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-30 text-white p-2 rounded-full hover:bg-opacity-50"
    >
      ›
    </button>

    <!-- Pötty navigáció -->
    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <button
        v-for="(image, index) in images"
        :key="index"
        @click="goToSlide(index)"
        :class="[
          'w-3 h-3 rounded-full',
          currentIndex === index ? 'bg-white' : 'bg-gray-400'
        ]"
      ></button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        'https://picsum.photos/id/1018/1000/600',
        'https://picsum.photos/id/1015/1000/600',
        'https://picsum.photos/id/1019/1000/600',
        'https://picsum.photos/id/1020/1000/600',
        'https://picsum.photos/id/1021/1000/600'
      ],
      currentIndex: 0,
      interval: null
    }
  },
  mounted() {
    this.startAutoSlide()
  },
  beforeUnmount() {
    clearInterval(this.interval)
  },
  methods: {
    startAutoSlide() {
      this.interval = setInterval(() => {
        this.nextSlide()
      }, 4000) // 4 másodpercenként vált
    },
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length
    },
    prevSlide() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length
    },
    goToSlide(index) {
      this.currentIndex = index
    }
  }
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity 1s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
