<template>
  <section class="bg-neutral-800 border-2 border-orange-600 p-5 md:p-4 max-w-[1500px] mx-auto shadow-md">
    <h2 class="text-orange-600 font-bold text-lg md:text-xl mb-3 tracking-wide">
      {{ title }}
    </h2>

    <div 
      class="text-sm text-white text-left leading-relaxed prose-sm prose-invert max-w-none"
      v-html="text"
    ></div>
  </section>
</template>

<script setup>
/**
 * Vue 3 Composition API - script setup
 * A propok definiálása egyszerűbb és típusbiztosabb
 */
defineProps({
  title: {
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
/* A v-html-en keresztüli tartalom formázása */
:deep(p) {
  @apply mb-3 last:mb-0;
}

:deep(ul) {
  @apply list-disc list-inside mb-3;
}

:deep(strong), :deep(b) {
  @apply text-orange-500 font-semibold;
}
</style>