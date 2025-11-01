<template>
  <RouterLink to="#" class="w-44 md:w-52 h-full bg-neutral-800 rounded-sm border-2 border-orange-600 responsive-card">
    <img :src="image" :alt="image" class="w-full h-full object-cover rounded-tl-sm rounded-tr-sm">
    <h4 class="text-lg font-semibold text-center text-white p-2" v-html="title"></h4>
  </RouterLink>
</template>

<script>
export default {
  props: {
    image: String,
    title: String,
    link: String
  }
}
</script>

<style scoped>
@media (max-width: 411px) {
  .responsive-card {
    width: 100%;
  }
}
</style>
