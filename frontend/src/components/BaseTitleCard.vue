<template>
  <component
    :is="link ? 'RouterLink' : 'div'"
    v-bind="linkProps"
    class="w-40 max-[380px]:w-[40%] md:w-52 flex flex-col bg-neutral-800 rounded-sm border-2 border-orange-600 overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-orange-600/20 hover:-translate-y-1 group"
  >
    <div class="relative w-full aspect-square overflow-hidden bg-neutral-900">
      <img 
        :src="image" 
        :alt="title" 
        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
        loading="lazy"
      />
    </div>

    <h4 
      class="text-sm font-semibold text-center text-white p-2 flex-grow flex items-center justify-center leading-tight" 
      v-html="title"
    ></h4>
  </component>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  image: { 
    type: String, 
    required: true 
  },
  title: { 
    type: String, 
    required: true 
  },
  link: { 
    type: [String, Object], 
    default: null 
  }
})

/**
 * Kiszámoljuk az attribútumokat: 
 * Ha van link, hozzáadjuk a 'to' propot, különben üres objektumot adunk vissza.
 */
const linkProps = computed(() => {
  return props.link ? { to: props.link } : {}
})
</script>

<style scoped>
/* A v-html-en keresztüli szöveg formázása (pl. ha van benne <br>) */
:deep(span) {
  @apply text-orange-500;
}
</style>