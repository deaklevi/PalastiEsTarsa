<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Lézergravírozás
      </h2>
    </div>

    <!-- Itt már csak a komponens -->
    <BaseArchitectureCard group="lezergravirozas" />
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseArchitectureCard from '@components/BaseArchitectureCard.vue'

export default {
  components: {
    BaseLayout,
    BaseArchitectureCard
  }
}
</script>

<route lang="json">
{
  "name": "szolgaltatasok-lezergravirozas",
  "meta": {
    "title": "Lézergravírozás – Palásti és Társa Kft.",
    "description": "A szolgáltatások oldalon bemutatjuk a síremlék és egyéb építészeti munkálatokhoz tartozó tevékenységi körünket, amivel professzionálisan eleget tehetünk az egyre inkább gyakori különleges igényeknek. Ehhez rendelkezésre álnak megfelelő hardverek, szoftverek és a nélkülözhetetlen szakmai potencia."
  }
}
</route>
