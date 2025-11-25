<template>
    <div class="w-full md:w-[560px]">
        <h2 class="mb-5 text-xl w-full text-center">
            {{ title }}
        </h2>
        <iframe class="w-full h-[300px] md:h-[315px] border-2 border-orange-600" :src="link" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen ></iframe>
    </div>
</template>

<script>
export default {
  props: {
    title: String,
    link: String
  }
}
</script>
