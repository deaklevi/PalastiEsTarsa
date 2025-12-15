<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Fehér márvány</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Marvany/feher.jpg" text="A <span class='text-orange-600 font-semibold'>fehér márvány</span> is metamorf kőzet, mint bármely másik színű. Ami annyit jelent, hogy a korábban kialakult kőzetek – ez esetben üledékes- vagy már korábban metamorfizált kőzet – szilárd fázisú átkristályosodásával, azaz magas hőmérsékleten és nyomáson, meghatározott feltételek mellett alakult át. A márványok struktúráját és szerkezetét az határozza meg, hogy ez a hőmérséklet és nyomás milyen mértékű. Színe a különböző szennyeződések szerint változik.  A mészkő anyakőzet „szennyeződéseinek” megfelelően különböző színű (fehér, barna, zöld, kék, fekete stb. és ezeknek a véletlenszerű kombinációi) márványokat találunk a természetben. A tiszta fehér márvány több mint 95% karbonátásványt (kalcitot) tartalmaz. Az erezett, felhős fehér márvány szennyezettsége csekély, míg az abszolút homogén hófehéré minimális vagy nulla. Gyenge ásványi ill. erős szervetlen savak is megtámadhatják a márvány felületét, felmarják, feloldják. ( Sósav, vízkőoldók, ecetsav, citromsav, vörösbor, nikotin stb.) Ezért a gyakorlatban még a füstös, szennyezett levegőtől is óvni, védeni kell ezeket a felületeket. Míg pl. konyha- és fürdőszobapultnak nem igazán szerencsés választani, addig az ablakpárkányok és belső burkolatok területén közkedvelt. Viszonylag puha kőzet. Rajzolatát és struktúráját tekintve, többségében erezett szerkezetű, de a fotógalériában bemutatott fehér márványok között látható felhős rajzolatú is. A felhasználási terület nagyon különböző és változatos, mert a tulajdonságaikat (nedvszívó képesség, nyomó szilárdság, stb.) figyelembe véve a fehér márványok nem alkalmazhatóak minden területen. Kérem, tekintse meg kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="feher-marvany" class="mt-12 md:mt-[4rem]"/>

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
  "name": "ko-anyagminta-feher-marvany",
  "meta": {
    "title": "Fehér márvány – Palásti és Társa Kft.",
    "description": "A fehér márvány is metamorf kőzet, mint bármely másik színű. Ami annyit jelent, hogy a korábban kialakult kőzetek – ez esetben üledékes- vagy már korábban metamorfizált kőzet – szilárd fázisú átkristályosodásával, azaz magas hőmérsékleten és nyomáson, meghatározott feltételek mellett alakult át. A márványok struktúráját és szerkezetét az határozza meg, hogy ez a hőmérséklet és nyomás milyen mértékű."
  }
}
</route>