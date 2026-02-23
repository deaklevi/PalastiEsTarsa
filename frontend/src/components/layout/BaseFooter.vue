<template>
  <footer class="w-full bg-slate-950 text-white border-t border-orange-600/20">
    <div class="max-w-7xl mx-auto px-6 py-12 md:py-16">
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-4 items-start">
        
        <div class="flex flex-col md:items-center text-left md:text-center group">
          <div class="flex items-center md:justify-center mb-4">
            <h3 class="text-orange-600 font-bold text-lg uppercase tracking-wider">Cím</h3>
          </div>
          <p class="text-gray-400 hover:text-white transition-colors duration-300">
            <a href="https://www.google.com/maps/search/?api=1&query=1214+Budapest+II.+Rákóczi+Ferenc+út+251" 
               target="_blank" 
               class="hover:underline leading-relaxed">
              H-1214 Budapest<br>
              II. Rákóczi Ferenc út 251.
            </a>
          </p>
        </div>

        <div class="flex flex-col md:items-center text-left md:text-center border-y md:border-y-0 md:border-x border-orange-600/30 py-8 md:py-0">
          <h3 class="text-orange-600 font-bold text-lg uppercase tracking-wider mb-4">Elérhetőség</h3>
          <div class="space-y-3 text-sm md:text-base">
            <p class="flex flex-col">
              <span class="text-gray-500 text-xs uppercase font-semibold">Iroda</span>
              <a href="tel:+3612768246" class="hover:text-orange-600 transition-colors">+36-1-276-8246</a>
            </p>
            <p class="flex flex-col">
              <span class="text-gray-500 text-xs uppercase font-semibold">Palásti István (Igazgató)</span>
              <a href="tel:+36302790261" class="hover:text-orange-600 transition-colors">+36-30-279-0261</a>
            </p>
            <p class="flex flex-col">
              <span class="text-gray-500 text-xs uppercase font-semibold">Deák László (Telephely vezető)</span>
              <a href="tel:+36309004800" class="hover:text-orange-600 transition-colors">+36-30-900-4800</a>
            </p>
            <p class="mt-4 pt-4 border-t border-white/5 italic">
              <a href="mailto:palasti.kft@gmail.com" class="text-orange-600 hover:underline">palasti.kft@gmail.com</a>
            </p>
          </div>
        </div>

        <div class="flex flex-col md:items-center text-left md:text-center">
          <h3 class="text-orange-600 font-bold text-lg uppercase tracking-wider mb-4">Nyitvatartás</h3>
          <ul class="text-gray-400 space-y-2">
            <li class="flex justify-between md:justify-center md:gap-4">
              <span class="font-medium text-gray-300">Hétfő - péntek:</span>
              <span>07:30 - 16:30</span>
            </li>
            <li class="flex justify-between md:justify-center md:gap-4">
              <span class="font-medium text-gray-300">Szombat:</span>
              <span>09:00 - 12:00</span>
            </li>
            <li class="flex justify-between md:justify-center md:gap-4 text-red-500/80">
              <span class="font-medium">Vasárnap:</span>
              <span>Zárva</span>
            </li>
          </ul>
        </div>

      </div>

      <div class="mt-16 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
        <h3 class="text-gray-500 text-sm font-medium tracking-wide">
          Minden jog fenntartva © {{ new Date().getFullYear() }} - <span class="text-gray-300">Palásti és Társa Kft.</span>
        </h3>
        <div class="flex gap-6 text-xs text-gray-600 uppercase font-bold tracking-widest">
          <span class="hover:text-orange-600 cursor-help transition-colors">Minőség</span>
          <span class="hover:text-orange-600 cursor-help transition-colors">Hagyomány</span>
          <span class="hover:text-orange-600 cursor-help transition-colors">Szakértelem</span>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
// Modern Vue 3 script setup
</script>

<style scoped>
/* Egyedi hover effekt a linkeknek */
a {
  @apply transition-all duration-300;
}
</style>