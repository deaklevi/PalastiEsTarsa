<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Urna sírkő 4. csoport
      </h2>
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="U4" />
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseTombstoneCard from '@components/BaseTombstoneCard.vue'

export default {
  components: {
    BaseLayout,
    BaseTombstoneCard
  }
}
</script>

<route lang="json">
{
  "name": "urna-sirko-csoport-4",
  "meta": {
    "title": "Urna sírkő 4 csoport – Palásti és Társa Kft.",
    "description": "Az urna sírkő készítésére az utóbbi évtizedekben egyre nagyobb az igény. Ennek oka, hogy a nagyobb városok temetőiben egyre kevesebb a hely, és az urna síremlék mérete jóval kisebb, mint a hagyományos koporsós sírhelyé. A fotógalériában látható urna síremlékek csak ízelítőt adnak a lehetőségekből, a formák és a gránit fajtája szabadon változtatható."
  }
}
</route>
