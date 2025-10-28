<template>
  <BaseLayout>
    <BaseSlider class="lg:mt-52"/>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseSlider from '@components/BaseSlider.vue';

export default {
  components: {
    BaseLayout,
    BaseSlider
  }
}
</script>

<route lang="json">
{
  "name": "home",
  "meta": {
    "title": "Főoldal – Palásti és Társa Kft.",
    "description": "Palásti és Társa Kft. hivatalos weboldala –"
  }
}
</route>