<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Fehér mészkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Meszko/feher.jpg" text="A <span class='text-orange-600 font-semibold'>fehér mészkő</span> anyagának eredeti forrása a magmás kőzetek ásványaiból származó kalcium-ion és a vulkáni működés során a légkörbe kerülő szén-dioxid. A földtörténeti fejlődés során az anyag egyre nagyobb hányada származott a régebbi karbonátos kőzetek lepusztulásából. A vízben oldott kalcium-hidrogénkarbonátot a folyók szállítják a tengerekbe. Egyes elképzelések szerint a földtörténet korai időszakaiban a karbonátok közvetlenül, vegyi úton is kicsapódhattak a tengervízből, jelenleg azonban a tengervíz megnövekedett magnéziumtartalma miatt csak a trópusi tengerek erősen besűrűsödő vizéből válik ki egy kevés aragonit. A másik elképzelés szerint a tengervízben oldott kalcium-karbonát túlnyomó részét már az ősi időkben is döntően az élőlények választották ki. A mészkő színe anyagi összetételétől függően nagyon változatos. A magas karbonáttartalmú, tiszta mészkövek fehérek. A fehér mészkő kiváló kőzettani tulajdonságai és természetes esztétikája miatt egyre nagyobb a felhasználási terület, ahol alkalmazzák kültéren és beltérben egyaránt. Padló-, fal- és homlokzat burkolat, szökőkút, szobor talpazat vagy akár emlékmű is. Kérem, tekintse meg fehér mészkő kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="feher-meszko" class="mt-12 md:mt-[4rem]"/>

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
  "name": "ko-anyagminta-feher-meszko",
  "meta": {
    "title": "Fehér mészkő – Palásti és Társa Kft.",
    "description": "A fehér mészkő anyagának eredeti forrása a magmás kőzetek ásványaiból származó kalcium-ion és a vulkáni működés során a légkörbe kerülő szén-dioxid. A földtörténeti fejlődés során az anyag egyre nagyobb hányada származott a régebbi karbonátos kőzetek lepusztulásából. A vízben oldott kalcium-hidrogénkarbonátot a folyók szállítják a tengerekbe."
  }
}
</route>