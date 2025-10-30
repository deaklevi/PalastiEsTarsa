<template>
  <BaseLayout>
    <BaseSlider class="min-[770px]:mt-52"/>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseSlider from '@components/BaseSlider.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue';

export default {
  components: {
    BaseLayout,
    BaseSlider,
    BaseInfoCard
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