<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Különleges sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/kulonleges-sirko.jpg" text="A <span class='text-orange-600 font-semibold'>különleges sírkő</span> galériában az összes síremlék bemutatható lenne, mert mind egyedi és rendkívüli. Próbáltuk inkább a formabontó, újszerű, egyediséget tükröző szokatlan megoldásokat bemutatni. A mai modern technológiának és a jó szakembereknek köszönhetően ez a lehetőség mára már nem kiváltság. Elég egy apró jelzés, ami sokat elmondtat az elhunytról, és ez még inkább sajátossá, egyedivé teszi a síremléket. Mik lehetnek ezek a jelzések? A szeretett növény, kedvenc tárgy, hobbi vagy foglalkozás képi vagy érzéki megjelenítése. Ennek a legegyszerűbb módja a kontúrrajzos ábrázolás, de tovább lépve, lehet mélyített dombormű is. Ha nem csak egy apró jelzést szeretnénk, hanem a sírkő formáját is alapvetően meghatározó kompozíciót, az csak gondos tervezés alapján lehetséges. Egy sakk nagymesternek készítettünk egy 800 kilogrammos „bástyát”, és egy szeretett könyvtárosnak pedig egy 1400 kilogrammos „könyvet”. Ilyen esetekben az alapoknak is sokkal erősebbnek kell lennie a teherbírás végett. A galériában látható síremlékek az egyedi igényeket figyelembe véve, saját tervezés alapján, kizárólag magyar munkaerővel készültek." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="KS1" class="mt-12 md:mt-[4rem]"/>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseTombstoneCard from '@components/BaseTombstoneCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseTombstoneCard
  }
}
</script>

<route lang="json">
{
  "name": "kulonleges-sirko",
  "meta": {
    "title": "Különleges sírkő – Palásti és Társa Kft.",
    "description": "A különleges sírkő galériában az összes síremlék bemutatható lenne, mert mind egyedi és rendkívüli. Próbáltuk inkább a formabontó, újszerű, egyediséget tükröző szokatlan megoldásokat bemutatni. A mai modern technológiának és a jó szakembereknek köszönhetően ez a lehetőség mára már nem kiváltság. Elég egy apró jelzés, ami sokat elmondtat az elhunytról, és ez még inkább sajátossá, egyedivé teszi a síremléket. Mik lehetnek ezek a jelzések?"
  }
}
</route>