<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Anyagtár</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/anyagtar.jpg" text=">Az <span class='text-orange-600 font-semibold'>anyagtár</span> oldalon bemutatott anyagminták, mint gránit, márvány és mészkő, a telephelyünkön általában használt standard köveket prezentálja. A világon bányászott körülbelül háromezer féle kőzetet, képtelenség egy telephelyen, raktáron tartani. A raktárkészlet alapanyagai néha változnak, mert előfordul, hogy egy fajta kőzet elfogy vagy olyan meddő részhez érkezik a bányászat, hogy több egészséges tömböt nem ad a bánya, ennek okán megszűnik. Ezzel párhuzamosan pedig tárnak fel új területeket, ami teljesen új anyagokat kínálnak. Folyamatosan cserélődik a termék paletta. Lehetőségeinkhez mérten az igényeknek megfelelően próbálunk minden színcsoportból raktáron tartani több fajta követ. A felhasználási terület nagyon különböző és változatos, mert a tulajdonságaikat (nedvszívó képesség, nyomó szilárdság, stb.) figyelembe véve egyes gránit, márvány és mészkő fajták nem alkalmazhatóak minden területen. Ha a kínálatban nem talál megfelelő alapanyagot, természetesen megoldható más egyéb kövek beszerzése is. Kérem, tekintse meg kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <h2 class="mt-12 md:mt-[10.5rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Gránit</h2>
    <BaseStoneCard group="anyagtar-granit"/>

    <h2 class="mt-12 md:mt-[10.5rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Márvány</h2>
    <BaseStoneCard group="anyagtar-granit"/>

    <h2 class="mt-12 md:mt-[10.5rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Mészkő</h2>
    <BaseStoneCard group="anyagtar-granit"/>

  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseStoneCard from '@components/BaseStoneCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseStoneCard
  }
}
</script>

<route lang="json">
{
  "name": "ko-anyagminta-anyagtar",
  "meta": {
    "title": "Anyagtár – Palásti és Társa Kft.",
    "description": "Az anyagtár oldalon bemutatott anyagminták, mint gránit, márvány és mészkő, a telephelyünkön általában használt standard köveket prezentálja. A világon bányászott körülbelül háromezer féle kőzetet, képtelenség egy telephelyen, raktáron tartani. A raktárkészlet alapanyagai néha változnak, mert előfordul, hogy egy fajta kőzet elfogy vagy olyan meddő részhez érkezik a bányászat, hogy több egészséges tömböt nem ad a bánya, ennek okán megszűnik. Ezzel párhuzamosan pedig tárnak fel új területeket, ami teljesen új anyagokat kínálnak."
  }
}
</route>