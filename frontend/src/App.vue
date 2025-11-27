<script setup>
import { RouterView } from 'vue-router'
import { onMounted } from 'vue'
import { useTombstone } from '@stores/TombstoneStore.mjs'
import { useAccessory } from '@stores/AccessoryStore.mjs'
import { useArchitecture } from '@stores/ArchitectureStore.mjs'
import { useWork } from '@stores/WorkStore.mjs'

const tombstoneStore = useTombstone()
const accessoryStore = useAccessory()
const architectureStore = useArchitecture()
const workStore = useWork()

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

  if (!workStore.works.length) {
    workStore.getWorks()
  }
})
</script>

<template>
  <RouterView />
</template>
