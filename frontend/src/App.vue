<script>
import { RouterView } from 'vue-router';
import { useUrnaTombstone } from '@stores/UrnaTombstoneStore.mjs'
import { useSzimplaTombstone } from '@stores/SzimplaTombstoneStore.mjs'

export default {
  components: {
    RouterView
  },
  mounted() {
    useUrnaTombstone().getUrnaTombstones(),
    useSzimplaTombstone().getSzimplaTombstones()
  }
}
</script>

<template>
  <RouterView />
</template>
