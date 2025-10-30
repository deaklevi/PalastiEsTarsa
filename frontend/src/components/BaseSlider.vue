<template>
  <div class="relative inset-x-0 w-full max-w-3xl mx-auto overflow-hidden min-[770px]:shadow-[0_10px_15px_rgba(0,0,0,0.6)] min-[772px]:rounded-md">
    <!-- Slide képek -->
    <div class="relative w-full min-[470px]:h-64 h-44">
      <transition-group name="fade" tag="div">
        <img v-for="(image, index) in images" :key="index"
        v-show="currentIndex === index" :src="image"
        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000" />
      </transition-group>
    </div>

    <!-- Pötty navigáció -->
    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <button v-for="(image, index) in images" :key="index"
      @click="goToSlide(index)" :class="['w-3 lg:w-2 lg:h-2 h-3 rounded-full',
      currentIndex === index ? 'bg-white' : 'bg-gray-400' ]"></button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        "../../public/Slider/slider_img_1.jpg",
        "../../public/Slider/slider_img_2.jpg",
        "../../public/Slider/slider_img_3.jpg",
        "../../public/Slider/slider_img_4.jpg",
        "../../public/Slider/slider_img_5.jpg",
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
      }, 3000) // 5 másodpercenként vált
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
