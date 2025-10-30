<template>
  <div class="flex flex-col items-center bg-neutral-800 border-2 border-orange-600 p-5 md:p-2 md:flex-row md:items-start">
    <img :src="image" :alt="image" class="h-40 mb-5 md:mb-0">
    <p class="md:ml-5 text-sm text-white text-left max-w-[500px] md:max-w-max" v-html="text"></p>
  </div>
</template>

<script>
export default {
    props: {
        image: String,
        text: String
    }
}
</script>