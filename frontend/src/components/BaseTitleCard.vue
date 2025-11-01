<template>
  <component
    :is="link ? 'RouterLink' : 'div'"
    v-bind="link ? { to: link } : {}"
    class="w-40 md:w-52 h-full bg-neutral-800 rounded-sm border-2 border-orange-600"
  >
    <img :src="image" :alt="title" class="w-full h-full object-cover rounded-tl-sm rounded-tr-sm" />
    <h4 class="text-lg font-semibold text-center text-white p-2" v-html="title"></h4>
  </component>
</template>

<script>
export default {
  props: {
    image: { type: String, required: true },
    title: { type: String, required: true },
    link: { type: [String, Object], default: null } // explicit default
  }
}
</script>
