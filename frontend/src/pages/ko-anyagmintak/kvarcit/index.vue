<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kvarcit</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/kvarcit.jpg" text="A <span class='text-orange-600 font-semibold'>kvarcit</span> vaskos vagy szemcsés kvarcból álló metamorf kőzet. A kvarc a fölkéreg egyik legelterjedtebb ásványa. Kvarcszemekből áll a puszták, sivatagok, folyóvizek s részben a tengerek homokja, kavicsa, úgyszintén a homokkő is. Az apró kvarcszemcsék átkristályosodnak a metamorfózis során. Ez minél mélyebben történt, annál keményebb az így keletkezett tömör és finomszemcsés kvarcit. Színét tekintve rendkívül változatos. Alapvetően víztiszta, de gyakran tartalmaz színező és „szennyező” anyagokat, amitől bármilyen színben előfordulhat. Tulajdonságai közé tartozik, hogy fagyálló, kopásálló és jó a különböző savakkal és sókkal szembeni ellenálló képessége. A kvarcit kiváló kőzettani tulajdonságai és természetes esztétikája miatt egyre nagyobb a felhasználási terület, ahol alkalmazzák kültéren és beltérben egyaránt. Padló-, fal- és homlokzat burkolat, fürdőszobai mosdópult vagy konyhai munkalap. Kérem, tekintse meg kvarcit kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="kvarcit" class="mt-12 md:mt-[10.5rem]"/>

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
  "name": "ko-anyagminta-kvarcit",
  "meta": {
    "title": "Kvarcit – Palásti és Társa Kft.",
    "description": "A kvarcit vaskos vagy szemcsés kvarcból álló metamorf kőzet. A kvarc a fölkéreg egyik legelterjedtebb ásványa. Kvarcszemekből áll a puszták, sivatagok, folyóvizek s részben a tengerek homokja, kavicsa, úgyszintén a homokkő is. Az apró kvarcszemcsék átkristályosodnak a metamorfózis során. Ez minél mélyebben történt, annál keményebb az így keletkezett tömör és finomszemcsés kvarcit. Színét tekintve rendkívül változatos."
  }
}
</route>