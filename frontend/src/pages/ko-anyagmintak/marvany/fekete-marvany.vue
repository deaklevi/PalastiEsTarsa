<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Fekete márvány</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Marvany/fekete.jpg" text="A <span class='text-orange-600 font-semibold'>fekete márvány</span> is metamorf kőzet, mint bármely másik színű. Ami annyit jelent, hogy a korábban kialakult kőzetek – ez esetben üledékes- vagy már korábban metamorfizált kőzet – szilárd fázisú átkristályosodásával, azaz magas hőmérsékleten és nyomáson, meghatározott feltételek mellett alakult át. A márványok struktúráját és szerkezetét az határozza meg, hogy ez a hőmérséklet és nyomás milyen mértékű. Színe a különböző szennyeződések szerint változik. A leggyakoribb a vas-oxid és a mangán-oxid okozta elszíneződés. A fekete színért többnyire a wüstit, hematit, lepidokrocit és a feroxihit ásványok a felelősek. Gyenge ásványi, ill. erős szervetlen savak is megtámadhatják a márvány felületét, felmarják, feloldják. ( Sósav, vízkőoldók, ecetsav, citromsav, vörösbor, nikotin stb.) Ezért a gyakorlatban még a füstös, szennyezett levegőtől is óvni, védeni kell ezeket a felületeket. Míg pl. konyha- és fürdőszobapultnak nem igazán szerencsés választani, addig az ablakpárkányok és belső burkolatok területén közkedvelt. Viszonylag puha kőzet. Rajzolatát és struktúráját tekintve, többségében erezett szerkezetű, de a fotógalériában bemutatott fekete márványok között látható felhős rajzolatú is. A felhasználási terület nagyon különböző és változatos, mert a tulajdonságaikat (nedvszívó képesség, nyomó szilárdság, stb.) figyelembe véve a fekete márványok nem alkalmazhatóak minden területen. Kérem, tekintse meg kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="fekete-marvany" class="mt-12 md:mt-[10.5rem]"/>

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
  "name": "ko-anyagminta-fekete-marvany",
  "meta": {
    "title": "Fekete márvány – Palásti és Társa Kft.",
    "description": "A fekete márvány is metamorf kőzet, mint bármely másik színű. Ami annyit jelent, hogy a korábban kialakult kőzetek – ez esetben üledékes- vagy már korábban metamorfizált kőzet – szilárd fázisú átkristályosodásával, azaz magas hőmérsékleten és nyomáson, meghatározott feltételek mellett alakult át. A márványok struktúráját és szerkezetét az határozza meg, hogy ez a hőmérséklet és nyomás milyen mértékű."
  }
}
</route>