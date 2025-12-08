<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Horvát mészkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Meszko/horvat.jpg" text="A <span class='text-orange-600 font-semibold'>horvát mészkő</span> - struktúráját, színét és fizikai jellemzőit figyelembe véve, mint gyűjtőnév - nagyon sokrétű, változatos kőzetet takar. Van köztük teljesen homogén vagy egészen mozgalmas, fosszíliadús szerkezetű; egészen világos szinte fehér, vagy bézs és szürke színű; és nem szabad figyelmen kívül hagyni az általános jellemzőit, azaz nedvszívó képesség, keménység, kopás állóság tulajdonságait, mert célszerű ezen adatok alapján meghatározni, hogy mely építészeti területen javasolt felhasználni. A legkeményebb és a legpuhább mészkövek közé tartozik egyaránt. Szakembereink segítenek eldönteni, hogy az előírt minőségi elvárásoknak legmegfelelőbbet tudja kiválasztani. A keményebb horvát mészkövek kiváló kőzettani tulajdonságai miatt egyre nagyobb a felhasználási terület, ahol alkalmazzák kültéren és beltérben egyaránt. Padló-, fal- és homlokzat burkolat, szökőkút, szobor talpazat vagy akár emlékmű is. Kérem, tekintse meg horvát mészkő kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="horvat-meszko" class="mt-12 md:mt-[10.5rem]"/>

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
  "name": "ko-anyagminta-horvat-meszko",
  "meta": {
    "title": "Horvát mészkő – Palásti és Társa Kft.",
    "description": "A Horvát mészkő - struktúráját, színét és fizikai jellemzőit figyelembe véve, mint gyűjtőnév - nagyon sokrétű, változatos kőzetet takar. Van köztük teljesen homogén vagy egészen mozgalmas, fosszíliadús szerkezetű; egészen világos szinte fehér, vagy bézs és szürke színű; és nem szabad figyelmen kívül hagyni az általános jellemzőit, azaz nedvszívó képesség, keménység, kopás állóság tulajdonságait, mert célszerű ezen adatok alapján meghatározni, hogy mely építészeti területen javasolt felhasználni."
  }
}
</route>