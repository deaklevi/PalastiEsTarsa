<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Mészkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/meszko.jpg" text="A <span class='text-orange-600 font-semibold'>mészkő</span> üledékes kőzet, mely általában a nagyobb tömegű állóvizekben eredetileg laza formában mésziszap-szemcséket, ősmaradvány-(kövület, fosszília) töredékeket, valamint más törmelékes szemcséket, magába foglalva ülepedik le. Jellemzően legalább 90% kalcium-karbonátot tartalmaz. A fennmaradó rész főleg más karbonátásvány, kvarc vagy kova, agyag és szerves anyag. Ahogy nő a mészkő dolomittartalma, a kőzet fokozatosan dolomittá alakul. A mészkő és a dolomit átmenete folyamatos. A kezdetben nagyon hézagos üledéket, a mésziszapot, durva mészkövet a folyamatosan rárakódó újabb és újabb üledéktömegek tömörítették és végül egy csak kevésbé hézagos, tömött kőzet alakult ki. Mivel a tömött mészkövet alkotó kalcitkristályok keménysége csekély, ezért elég könnyen faragható. Viszonylag puha kőzet, fényezett felületét kültéren kevésbé, beltéren tovább tarja meg. A természetes mészkő árnyalatbeli különbségei szintén a természetes eredetéből fakadnak, ezért azt kifogásolni nem lehet. <br><br>Az alábbi galériában szín szerinti csoportokba osztottuk a mészkő fajtákat, hogy célirányosabban találja meg az Ön elképzelésének legmegfelelőbbet." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-52 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Ko-anyagminta/Meszko/jura.jpg" title="Jura mészkő" :link="{name: 'ko-anyagminta-jura-meszko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Meszko/horvat.jpg" title="Horvát mészkő" :link="{name: 'ko-anyagminta-horvat-meszko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Meszko/travertin.jpg" title="Travertin mészkő" :link="{name: 'ko-anyagminta-travertin-meszko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Meszko/feher.jpg" title="Fehér mészkő" :link="{name: 'ko-anyagminta-feher-meszko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Meszko/homokszinu.jpg" title="Homokszínű mészkő" :link="{name: 'ko-anyagminta-homokszinu-meszko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Meszko/szurke.jpg" title="Szürke mészkő" :link="{name: 'ko-anyagminta-szurke-meszko'}" />
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseTitleCard from '@components/BaseTitleCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseTitleCard
  }
}
</script>

<route lang="json">
{
  "name": "ko-anyagminta-meszko",
  "meta": {
    "title": "Mészkő – Palásti és Társa Kft.",
    "description": "A mészkő üledékes kőzet, mely általában a nagyobb tömegű állóvizekben eredetileg laza formában mésziszap-szemcséket, ősmaradvány-(kövület, fosszília) töredékeket, valamint más törmelékes szemcséket, magába foglalva ülepedik le. Jellemzően legalább 90% kalcium-karbonátot tartalmaz. A fennmaradó rész főleg más karbonátásvány, kvarc vagy kova, agyag és szerves anyag."
  }
}
</route>
