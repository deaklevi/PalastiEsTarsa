<template>
  <BaseHeader />
  <main class="mt-16">
    <slot />
  </main>
</template>

<script>
import BaseHeader from '@components/layout/BaseHeader.vue'

export default {
  components: {
    BaseHeader
  }
}
</script>
