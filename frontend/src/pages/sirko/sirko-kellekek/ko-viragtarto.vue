<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kő virágtartó</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/Sirko-kellekek/ko-viragtarto.jpg" text="A <span class='text-orange-600 font-semibold'>kő virágtartó</span> nem csupán önmagában egy dekorációs elem, hanem lehetőséget biztosít egy mini virágoskert kialakítására, ezért a bele ültetett növényekkel együtt látja el díszítő funkcióját. Az általunk készített virágtartó edényekbe - méretükből adódóan - törpe örökzöldeket, illetve jellemzően alacsony növényeket érdemes ültetni. Akár szezononként más-más virágok válthatják  egymást e virágtartókban, különös figyelemmel elhunyt szerettünk kedves virágaira. E különös gonddal készült, esztétikus gránit virágtartók ellenállnak az időjárás károsító hatásainak és fagyállóak is. Kiválasztásuknál érdemes  figyelembe venni, hogy a kő virágtál stílusában és színében is illeszkedjék a síremlékhez. Amennyiben Ön bizonytalan döntését illetően, forduljon segítségért munkatársainkhoz! További szempont lehet e virágtartók rögzítése, amit ezeknél a sírkő kiegészítőknél is fúrt és ragasztott technikával oldunk meg. A végső nyughely kialakítása része kultúránknak, melyet befolyásol hitünk, világlátásunk, ízlésünk, egész személyiségünk. Minden sírra kerülő tárggyal kifejezzük az elhunyt iránti érzéseinket, ám mégis a virággal beültetett sírhalom az, ami kultúrákon, vallásokon átívelve fejezi ki szerettünk emlékének ápolását." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseAccessoriesCard group="NR2" class="mt-12 md:mt-[4rem]"/>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseAccessoriesCard from '@components/BaseAccessoriesCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseAccessoriesCard
  }
}
</script>

<route lang="json">
{
  "name": "sirko-kellekek-ko-viragtarto",
  "meta": {
    "title": "Kő virágtartó – Palásti és Társa Kft.",
    "description": "A kő virágtartó nem csupán önmagában egy dekorációs elem, hanem lehetőséget biztosít egy mini virágoskert kialakítására, ezért a bele ültetett növényekkel együtt látja el díszítő funkcióját. Az általunk készített virágtartó edényekbe - méretükből adódóan - törpe örökzöldeket, illetve jellemzően alacsony növényeket érdemes ültetni. Akár szezononként más-más virágok válthatják  egymást e virágtartókban, különös figyelemmel elhunyt szerettünk kedves virágaira."
  }
}
</route>