<script setup>
import { RouterView } from 'vue-router'
import { onMounted } from 'vue'
import { useTombstone } from '@stores/TombstoneStore.mjs'
import { useStone } from '@stores/StoneStore.mjs'
import { useAccessory } from '@stores/AccessoryStore.mjs'
import { useArchitecture } from '@stores/ArchitectureStore.mjs'
import { useWork } from '@stores/WorkStore.mjs'

const tombstoneStore = useTombstone()
const stoneStore = useStone()
const accessoryStore = useAccessory()
const architectureStore = useArchitecture()
const workStore = useWork()

onMounted(() => {
  if (!tombstoneStore.tombstones.length) {
    tombstoneStore.getTombstones()
  }

  if (!stoneStore.stones.length) {
    stoneStore.getStones()
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
