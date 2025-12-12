<template>
  <BaseHeader />
  <main class="mb-24 md:mb-52 mt-[64px]">
    <slot />
  </main>
  <BaseFooter class="lg:hidden" />
</template>

<script>
import BaseHeader from '@components/layout/BaseHeader.vue'
import BaseFooter from '@components/layout/BaseFooter.vue'

export default {
  components: {
    BaseHeader,
    BaseFooter
  }
}
</script>
