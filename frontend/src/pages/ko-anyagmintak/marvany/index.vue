<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Márvány</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/marvany.jpg" text="A <span class='text-orange-600 font-semibold'>márvány</span>, mint üledékes kőzet, a mészkő metamorf módosulata, amely magas hőmérsékleten és nyomáson, meghatározott feltételek mellett kristályosodik át. A tiszta márvány több mint 95% karbonátásványt (kalcitot) tartalmaz. A mészkő anyakőzet „szennyeződéseinek” megfelelően különböző színű (fehér, barna, zöld, kék, fekete stb. és ezeknek a véletlenszerű kombinációi) márványokat találunk a természetben. Egyszóval a márvány üledékes kőzet, melyek keletkezése a körülményektől függően történhetett szerves állati maradványok elmeszesedése, ill. vízben oldott mészvegyületek kicsapódása révén egyaránt. (Cseppkő, vízkő stb.) <br><br>Gyenge ásványi ill. erős szervetlen savak is megtámadhatják a márvány felületét, felmarják, feloldják. ( Sósav, vízkőoldók, ecetsav, citromsav, vörösbor, nikotin stb.) Ezért a gyakorlatban még a füstös, szennyezett levegőtől is óvni, védeni kell ezeket a felületeket. A felület reakcióképességének és felületaktivitásának ellenére az építőipari felhasználása töretlen. Korlátai ellenére, gyönyörű, exkluzív esztétikai megjelenése sok alkalmazásnál előtérbe helyezik az alternatív „ipari” hidegburkolatokkal szemben. Míg pl. konyha- és fürdőszobapultnak nem igazán szerencsés választani, addig az ablakpárkányok és belső burkolatok területén közkedvelt. Viszonylag puha kőzet, ásvány. A természetes márványban előforduló repedezettség, töredezettség normális jelenség, a termék I.osztályba sorolását nem befolyásolja. A természetes márvány árnyalatbeli különbségei szintén a természetes eredetéből fakadnak, ezért azt kifogásolni nem lehet. <br><br>Az alábbi galériában szín szerinti csoportokba osztottuk a márvány fajtákat, hogy célirányosabban találja meg az Ön elképzelésének legmegfelelőbbet." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-52 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/carrarai.jpg" title="Carrarai" :link="{name: 'ko-anyagminta-carrarai-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/ruskicai.jpg" title="Ruskicai" :link="{name: 'ko-anyagminta-ruskicai-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/feher.jpg" title="Fehér" :link="{name: 'ko-anyagminta-feher-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/sarga.jpg" title="Sárga" :link="{name: 'ko-anyagminta-sarga-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/barna.jpg" title="Barna" :link="{name: 'ko-anyagminta-barna-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/voros.jpg" title="Vörös" :link="{name: 'ko-anyagminta-voros-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/rozsaszin.jpg" title="Rózsaszín" :link="{name: 'ko-anyagminta-rozsaszin-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/zold.jpg" title="Zöld" :link="{name: 'ko-anyagminta-zold-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/szurke.jpg" title="Szürke" :link="{name: 'ko-anyagminta-szurke-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/fekete.jpg" title="Fekete" :link="{name: 'ko-anyagminta-fekete-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/kek.jpg" title="Kék" :link="{name: 'ko-anyagminta-kek-marvany'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Marvany/multicolor.jpg" title="Multicolor" :link="{name: 'ko-anyagminta-multicolor-marvany'}" />
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
  "name": "ko-anyagminta-marvany",
  "meta": {
    "title": "Márvány – Palásti és Társa Kft.",
    "description": "A márvány, mint üledékes kőzet, a mészkő metamorf módosulata, amely magas hőmérsékleten és nyomáson, meghatározott feltételek mellett kristályosodik át. A tiszta márvány több mint 95% karbonátásványt (kalcitot) tartalmaz. A mészkő anyakőzet „szennyeződéseinek” megfelelően különböző színű (fehér, barna, zöld, kék, fekete stb. és ezeknek a véletlenszerű kombinációi) márványokat találunk a természetben."
  }
}
</route>
