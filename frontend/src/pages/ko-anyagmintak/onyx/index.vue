<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Onyx</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/onyx.jpg" text="Az <span class='text-orange-600 font-semibold'>onyx</span> a kőfeldolgozó- és az építőiparban használt kövek közül az egyik legszebb és legkülönlegesebb fajtája. Szerkezete mikrokristályos vagy kriptokristályos. Kémiai összetétele megegyezik a kvarcéval, de az eltérő kristályosodás eltérő tulajdonságokat eredményez, az onyx esetében sokkal puhább és törékenyebb, mint a kvarcitok. Szalagosan vagy sávosan elhelyezkedő, mikroszkopikus vagy nagyon apró kristályok alkotta tömeges halmazai oldatokból válnak ki. A szalagok és a sávok jellegzetes és tetszetős megjelenést kölcsönöznek a kőzetnek. Színét tekintve rendkívül változatos. Könnyen lehet mesterségesen színezni, és színeit felerősíteni. Változatos rajzolatának megfelelő különböző elnevezései: szalagos, csillagos, szivárvány- és felhőachát. Viszonylag puha kőzet ezért a gyenge ásványi ill. erős szervetlen savak is megtámadhatják az onyx felületét, felmarják, feloldják. ( Sósav, vízkőoldók, ecetsav, citromsav, vörösbor, nikotin stb.) Ezért a gyakorlatban még a füstös, szennyezett levegőtől is óvni, védeni kell. Korlátai ellenére, gyönyörű, exkluzív esztétikai megjelenése sok alkalmazásnál előtérbe helyezik az alternatív „ipari” hidegburkolatokkal szemben. Míg pl. konyha- és fürdőszobapultnak nem igazán alkalmas, addig a belső burkolatok választásánál, és az ablakpárkányok és az egyéb design díszítő kő elemek területén közkedvelt. Áttetszősége miatt, hátsó megvilágítással rendkívüli esztétikai impulzust ad. Kérem, tekintse meg onyx kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="onyx" class="mt-12 md:mt-[10.5rem]"/>

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
  "name": "ko-anyagminta-onyx",
  "meta": {
    "title": "Onyx – Palásti és Társa Kft.",
    "description": "Az onyx a kőfeldolgozó- és az építőiparban használt kövek közül az egyik legszebb és legkülönlegesebb fajtája. Szerkezete mikrokristályos vagy kriptokristályos. Kémiai összetétele megegyezik a kvarcéval, de az eltérő kristályosodás eltérő tulajdonságokat eredményez, az onyx esetében sokkal puhább és törékenyebb, mint a kvarcitok. Szalagosan vagy sávosan elhelyezkedő, mikroszkopikus vagy nagyon apró kristályok alkotta tömeges halmazai oldatokból válnak ki."
  }
}
</route>