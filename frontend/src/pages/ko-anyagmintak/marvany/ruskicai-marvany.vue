<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Ruskicai márvány</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Marvany/ruskicai.jpg" text="A <span class='text-orange-600 font-semibold'>ruskicai márvány</span>, Magyarországon tradicionális hagyományokkal bír. Az elmúlt 10 évben azonban az egész világ megismerte szépségét és az egyedi színstruktúráját. A bányák Romániában, Hunyad (Hunedoara) megyében, Ruszka havasain találhatóak. A hegy több féle színű (fehér, halvány sárga és rózsaszín) és struktúrájú márványt rejt magában. Tulajdonságát tekintve üledékes kőzet, a mészkő metamorf módosulata, amely magas hőmérsékleten és nyomáson, meghatározott feltételek mellett kristályosodott át évmilliók alatt. A tiszta márvány több mint 95% karbonátásványt (kalcitot) tartalmaz. Gyenge ásványi ill. erős szervetlen savak is megtámadhatják a márvány felületét, felmarják, feloldják. ( Sósav, vízkőoldók, ecetsav, citromsav, vörösbor, nikotin stb.) Ezért a gyakorlatban még a füstös, szennyezett levegőtől is óvni, védeni kell. A felület reakcióképességének és felületaktivitásának ellenére az építőipari felhasználása töretlen. Korlátai ellenére, gyönyörű, exkluzív esztétikai megjelenése sok alkalmazásnál előtérbe helyezik az alternatív „ipari” hidegburkolatokkal szemben. Míg pl. konyha- és fürdőszobapultnak nem igazán alkalmas, addig a szobrok alapanyag választásánál, és az ablakpárkányok és belső burkolatok területén közkedvelt. Az legkeményebb márványok közé tartozik. Rajzolatát és struktúráját tekintve, többségében erezett szerkezetű, de a fotógalériában bemutatott ruskicai (Ruschita) márványok között látható felhős rajzolatú is. A felhasználási terület nagyon különböző és változatos, mert a tulajdonságaikat (nedvszívó képesség, nyomó szilárdság, stb.) figyelembe véve a ruskicai márványok nem alkalmazhatóak minden területen. Kérem, tekintse meg kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="ruskicai-marvany" class="mt-12 md:mt-[4rem]"/>

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
  "name": "ko-anyagminta-ruskicai-marvany",
  "meta": {
    "title": "Ruskicai márvány – Palásti és Társa Kft.",
    "description": "A ruskicai márvány, Magyarországon tradicionális hagyományokkal bír. Az elmúlt 10 évben azonban az egész világ megismerte szépségét és az egyedi színstruktúráját. A bányák Romániában, Hunyad (Hunedoara) megyében, Ruszka havasain találhatóak. A hegy több féle színű (fehér, halvány sárga és rózsaszín) és struktúrájú márványt rejt magában."
  }
}
</route>