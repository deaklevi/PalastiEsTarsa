<script>
import { RouterView } from 'vue-router';
import { useUrnaTombstone } from '@stores/UrnaTombstone.mjs'

export default {
  components: {
    RouterView
  },
  mounted() {
    useUrnaTombstone().getUrnaTombstones()
  }
}
</script>

<template>
  <RouterView />
</template>
