<template>
  <div class="w-40 md:w-52">
    <img :src="'http://192.168.1.83:8000' + item.image_url" :alt="item.name" class="w-full" />
    <h5 class="text-sm text-center break-words"><span class="text-orange-600 font-semibold">{{ item.tombstone_id }}</span> | {{ item.name }}</h5>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  }
}
</script>
