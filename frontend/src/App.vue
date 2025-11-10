<script setup>
import { RouterView } from 'vue-router'
import { onMounted } from 'vue'
import { useTombstone } from '@stores/TombstoneStore.mjs'
import { useAccessory } from '@stores/AccessoryStore.mjs'

const tombstoneStore = useTombstone()
const accessoryStore = useAccessory()

onMounted(() => {
  if (!tombstoneStore.tombstones.length) {
    tombstoneStore.getTombstones()
  }

  if (!accessoryStore.accessories.length) {
    accessoryStore.getAccessories()
  }
})
</script>

<template>
  <RouterView />
</template>
