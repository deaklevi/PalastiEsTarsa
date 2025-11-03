<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kripta</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/kripta.jpg" text="A <span class='text-orange-600 font-semibold'>kripta</span>, a temetkezőhelyek néhány típusának összefoglaló neve. Jelentése – föld alatti temetkező hely, mely több koporsó és urna elhelyezésére alkalmas. Jelen korunkban már föld feletti építményekről is beszélhetünk, de hazánkban ez a formája nem jellemző. Az új gránit kripta tervezésénél figyelembe kell venni, hogy a meglévő régi kripta födémre, vagy teljesen új beton alsórészre kell építeni. Szükség szerint a föld alatti beton alsórészt is elkészítjük dupla fallal és az előírt megfelelő szigeteléssel. Gyakori eset, hogy a régi födémet és a leeresztő nyílást át kell tervezni, hogy statikailag megfeleljen a súlytartó és vízzáró követelményeknek. Az új kripta sírbolt formájának eldöntéséhez, jelentős segítséget nyújt egy háromdimenziós tervező program. A látványterv alapján könnyebben eldönthetőek a méretek, formák és színek összhatása. Az alábbi fotógalériában látható gránit kripták elkészítését megelőzte a gondos és precíz tervezés. Az elképzelt forma követhet tradicionális jellegeket, vagy akár teljesen modern, „elrugaszkodott” gondolatokat is. A formák és anyagok kombinálása számtalan formában előfordulhatnak. Az általunk elkészített gránit kripták kizárólag magyar munkaerővel készültek.<br><br><span class='text-orange-600 font-semibold'>Garancia:</span> - síremlékre 10 év." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="K1" class="mt-12 md:mt-[10.5rem]"/>
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
  "name": "kripta-sirko",
  "meta": {
    "title": "Kripta sírkő – Palásti és Társa Kft.",
    "description": "A kripta, a temetkezőhelyek néhány típusának összefoglaló neve. Jelentése – föld alatti temetkező hely, mely több koporsó és urna elhelyezésére alkalmas. Jelen korunkban már föld feletti építményekről is beszélhetünk, de hazánkban ez a formája nem jellemző. Az új gránit kripta tervezésénél figyelembe kell venni, hogy a meglévő régi kripta födémre, vagy teljesen új beton alsórészre kell építeni. Szükség szerint a föld alatti beton alsórészt is elkészítjük dupla fallal és az előírt megfelelő szigeteléssel. Gyakori eset, hogy a régi födémet és a leeresztő nyílást át kell tervezni, hogy statikailag megfeleljen a súlytartó és vízzáró követelményeknek"
  }
}
</route>