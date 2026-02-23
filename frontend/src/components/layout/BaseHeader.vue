<template>
  <nav class="fixed top-0 left-0 w-full h-16 bg-slate-950 flex justify-between items-center px-6 z-30 shadow-xl">
    <RouterLink :to="{ name: 'home' }" class="shrink-0">
      <img src="/Header/logo feher.png" alt="Logo" class="h-10 md:h-12 hover:scale-105 transition-transform">
    </RouterLink>

    <div class="hidden lg:flex items-center space-x-6">
      <RouterLink 
        v-for="link in navLinks" 
        :key="link.name"
        :to="{ name: link.routeName }"
        class="text-white text-sm font-medium hover:text-orange-500 transition-colors duration-300"
        active-class="text-orange-500"
      >
        {{ link.label }}
      </RouterLink>
    </div>

    <button 
      @click="menuOpen = !menuOpen" 
      class="lg:hidden flex flex-col justify-center items-center w-10 h-10 space-y-1.5 focus:outline-none z-40"
      aria-label="Menü"
    >
      <span 
        class="block w-7 h-0.5 bg-orange-600 transition-all duration-300 ease-in-out"
        :class="menuOpen ? 'rotate-45 translate-y-2' : ''"
      ></span>
      <span 
        class="block w-7 h-0.5 bg-orange-600 transition-all duration-300"
        :class="menuOpen ? 'opacity-0' : 'opacity-100'"
      ></span>
      <span 
        class="block w-7 h-0.5 bg-orange-600 transition-all duration-300 ease-in-out"
        :class="menuOpen ? '-rotate-45 -translate-y-2' : ''"
      ></span>
    </button>
  </nav>

  <Transition
    enter-active-class="transition duration-300 ease-out"
    enter-from-class="opacity-0 -translate-y-full"
    enter-to-class="opacity-100 translate-y-0"
    leave-active-class="transition duration-200 ease-in"
    leave-from-class="opacity-100 translate-y-0"
    leave-to-class="opacity-0 -translate-y-full"
  >
    <div 
      v-if="menuOpen" 
      class="fixed inset-0 bg-slate-950/95 z-20 flex flex-col items-center justify-center space-y-8 lg:hidden"
    >
      <RouterLink 
        v-for="link in navLinks" 
        :key="link.name"
        :to="{ name: link.routeName }"
        @click="menuOpen = false"
        class="text-white text-xl font-light hover:text-orange-500 transition-colors"
      >
        {{ link.label }}
      </RouterLink>
    </div>
  </Transition>
</template>

<script setup>
import { ref } from 'vue'

const menuOpen = ref(false)

const navLinks = [
  { label: 'Főoldal', routeName: 'home' },
  { label: 'Sírkő', routeName: 'sirko' },
  { label: 'Építészet', routeName: 'epiteszet' },
  { label: 'Szolgáltatások', routeName: 'szolgaltatasok' },
  { label: 'Kő anyagminták', routeName: 'ko-anyagminta' },
  { label: 'Egyéb információk', routeName: 'egyeb-informaciok' },
  { label: 'Kapcsolat', routeName: 'kapcsolat' },
  { label: 'Ajánlatkérés', routeName: 'ajanlatkeres' },
]
</script>