<template>
  <div class="relative inset-x-0 w-full max-w-3xl mx-auto overflow-hidden shadow-[0_10px_15px_rgba(0,0,0,0.6)] sm:rounded-md">
    <div class="relative w-full h-44 min-[470px]:h-64">
      <transition-group name="fade">
        <div 
          v-for="(image, index) in images" 
          :key="image"
          v-show="currentIndex === index"
          class="absolute inset-0 w-full h-full"
        >
          <img 
            :src="image" 
            :alt="`Slide ${index + 1}`"
            class="w-full h-full object-cover" 
          />
        </div>
      </transition-group>
    </div>

    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
      <button 
        v-for="(_, index) in images" 
        :key="index"
        @click="goToSlide(index)" 
        :aria-label="`Ugrás a ${index + 1}. diára`"
        :class="[
          'w-3 h-3 lg:w-2 lg:h-2 rounded-full transition-all duration-300',
          currentIndex === index ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/80'
        ]"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

// Képek listája - modern Vite projekteknél a /public mappát '/' jellel érjük el
const images = [
  "/Slider/slider_img_1.jpg",
  "/Slider/slider_img_2.jpg",
  "/Slider/slider_img_3.jpg",
  "/Slider/slider_img_4.jpg",
  "/Slider/slider_img_5.jpg",
]

const currentIndex = ref(0)
let timer = null

// Funkciók
const nextSlide = () => {
  currentIndex.value = (currentIndex.value + 1) % images.length
}

const goToSlide = (index) => {
  currentIndex.value = index
  resetTimer() // Manuális váltásnál indítsuk újra az órát
}

const startTimer = () => {
  timer = setInterval(nextSlide, 3000)
}

const resetTimer = () => {
  clearInterval(timer)
  startTimer()
}

// Életciklus hookok
onMounted(() => {
  startTimer()
})

onUnmounted(() => {
  clearInterval(timer)
})
</script>

<style scoped>
/* Fade átmenet animációja */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Biztosítja, hogy az új kép ne ugorjon fel, amíg a régi távozik */
.fade-leave-active {
  position: absolute;
}
</style>