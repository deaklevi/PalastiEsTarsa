<template>
  <nav class="fixed lg:static w-full bg-slate-950 flex justify-between items-center px-5 py-2 z-20">
    <RouterLink :to="{name: 'home'}">
      <img src="/Header/logo feher.png" alt="Logo" class="h-12">
    </RouterLink>

    <!-- Linkek (nagy nézet) -->
    <div class="text-white text-sm hidden lg:flex space-x-7 items-center">
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Főoldal</RouterLink>
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Sírkő</RouterLink>
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Építészet</RouterLink>
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Szolgáltatások</RouterLink>
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Kő anyagminták</RouterLink>
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Egyéb információk</RouterLink>
      <RouterLink to="#" class="hover:text-orange-600 transition-colors duration-300">Kapcsolat</RouterLink>
      <RouterLink to="#" class="text-orange-600 hover:text-white transition-colors duration-300">Ajánlatkérés</RouterLink>
    </div>

    <!-- Hamburger (mobil nézet) -->
    <div class="lg:hidden flex items-center h-full">
      <div class="hamburgerMenu-container inline-block" :class="{ 'active': menuOpen }"@click="toggleMenu">
        <div class="bar1 bg-orange-600 w-6 h-0.5 my-1"></div>
        <div class="bar2 bg-orange-600 w-6 h-0.5 my-1"></div>
        <div class="bar3 bg-orange-600 w-6 h-0.5 my-1"></div>
      </div>
    </div>
  </nav>
  <!-- Hamburger linkek (mobil nézet) -->
  <div class="fixed mt-16 py-5 space-y-5 bg-slate-950 bg-opacity-70 w-full flex flex-col text-white text-center transform transition-all duration-500 ease-out z-10" :class="{'opacity-100 translate-y-0': menuOpen, 'opacity-0 -translate-y-10 pointer-events-none': !menuOpen}">
    <RouterLink to="#">Főoldal</RouterLink>
    <RouterLink to="#">Sírkő</RouterLink>
    <RouterLink to="#">Építészet</RouterLink>
    <RouterLink to="#">Szolgáltatások</RouterLink>
    <RouterLink to="#">Kő anyagminták</RouterLink>
    <RouterLink to="#">Egyéb információk</RouterLink>
    <RouterLink to="#">Kapcsolat</RouterLink>
    <RouterLink to="#">Ajánlatkérés</RouterLink>
  </div>
</template>

<script>
export default {
  data() {
    return {
      menuOpen: false
    }
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen
    }
  }
}
</script>

<style>
.hamburgerMenu-container {
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  margin: 6px 0;
  transition: 0.4s;
}

.active .bar1 {
  transform: translate(0, 11px) rotate(-45deg);
}

.active .bar2 {opacity: 0;}

.active .bar3 {
  transform: translate(0, -11px) rotate(45deg);
}
</style>