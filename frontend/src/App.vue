<script setup>
import { RouterView } from 'vue-router'
import { onMounted } from 'vue'
import { useTombstone } from '@stores/TombstoneStore.mjs'
import { useAccessory } from '@stores/AccessoryStore.mjs'
import { useArchitecture } from '@stores/ArchitectureStore.mjs'

const tombstoneStore = useTombstone()
const accessoryStore = useAccessory()
const architectureStore = useArchitecture()

onMounted(() => {
  if (!tombstoneStore.tombstones.length) {
    tombstoneStore.getTombstones()
  }

  if (!accessoryStore.accessories.length) {
    accessoryStore.getAccessories()
  }

  if (!architectureStore.architectures.length) {
    architectureStore.getArchitectures()
  }
})
</script>

<template>
  <RouterView />
</template>
