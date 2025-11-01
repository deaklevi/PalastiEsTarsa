<template>
  <BaseHeader />
  <main class="mt-16">
    <slot />
  </main>
  <BaseFooter class="mt-24 md:mt-52" />
</template>

<script>
import BaseHeader from '@components/layout/BaseHeader.vue'
import BaseFooter from '@components/layout/BaseFooter.vue';

export default {
  components: {
    BaseHeader,
    BaseFooter
  }
}
</script>
