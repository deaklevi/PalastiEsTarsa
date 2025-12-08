<template>
  <div class=" bg-neutral-800 border-2 border-orange-600 p-5 md:p-2 max-w-[1500px] mx-auto">
    <h1 class="text-orange-600 font-semibold text-lg md:m-5">{{ title }}</h1>
    <br>
    <p class="md:m-10 text-sm text-white text-left" v-html="text"></p>
  </div>
</template>

<script>
export default {
    props: {
        title: String,
        text: String
    }
}
</script>