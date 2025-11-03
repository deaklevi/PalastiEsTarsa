<script setup>
import { RouterView } from 'vue-router'
import { useTombstone } from '@stores/TombstoneStore.mjs'
import { onMounted } from 'vue'

const tombstoneStore = useTombstone()

onMounted(() => {
  if (!tombstoneStore.tombstones.length) {
    tombstoneStore.getTombstones()
  }
})
</script>

<template>
  <RouterView />
</template>
