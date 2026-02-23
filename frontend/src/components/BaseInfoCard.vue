<template>
  <div class="flex flex-col md:flex-row items-center md:items-start bg-neutral-800 border-2 border-orange-600 p-5 md:p-4 gap-5 transition-all hover:shadow-lg hover:shadow-orange-600/10">
    <div class="flex-shrink-0">
      <img 
        :src="image" 
        :alt="image" 
        class="h-40 w-auto object-contain rounded-sm"
        loading="lazy"
      >
    </div>

    <div 
      class="text-sm text-white text-left max-w-[500px] md:max-w-none prose-sm prose-invert prose-orange"
      v-html="text"
    ></div>
  </div>
</template>

<script setup>
/**
 * A defineProps makróval deklaráljuk a propokat. 
 * Script setup-ban nem kell export default, se return.
 */
defineProps({
  image: {
    type: String,
    required: true
  },
  text: {
    type: String,
    default: ''
  }
})
</script>

<style scoped>
/* v-html esetén a belső elemek (pl. <p>, <b>) stílusát itt finomíthatjuk */
:deep(b), :deep(strong) {
  @apply text-orange-500 font-bold;
}

:deep(p) {
  @apply leading-relaxed mb-2 last:mb-0;
}
</style>