<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Akciós sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/akcios-sirko.jpg" text="Az <span class='text-orange-600 font-semibold'>akciós</span> sírkő oldalon alapvetően kirakatra készített síremlékek láthatók. A téli időszakban készült urna-, szimpla- és dupla sírkövek garantált maximális minőségben készülnek el, anyagát tekintve legyen az gránit, márvány vagy mészkő. Az akciós kirakati termékekre sok esetben 10-, 20- vagy akár 50%-os kedvezményt is tudunk adni. Az általunk készített síremlékek szépségét a belőle kialakított forma és maga az anyag határozza meg. A fotógalériában látható akciós síremlékek fotói nem mindig a valós kirakati állapotot tükrözi, mert nincs folyamatosan lehetőségünk arra, hogy a számtalan változást mindig regisztrálni tudjuk az oldalon. A síremlékeken apró változtatásra van lehetőség, ha van rá igény, ilyen például a lyukkivágás készítése ültethető virágnak. Az egyéb kiegészítőket, mint például váza, mécses tartó, ornamentika és felirat a sírkő jellegéhez és egyéb igényekhez igazítva lehet készíteni." />
    </div>

    <!-- Itt már csak a komponens -->
    <h2 class="mt-12 md:mt-[10.5rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Szimpla sírkő</h2>
    <BaseTombstoneCard group="SZK1"/>

    <h2 class="mt-12 md:mt-[10.5rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Urna sírkő</h2>
    <BaseTombstoneCard group="UK1"/>
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
  "name": "akcios-sirko",
  "meta": {
    "title": "Akciós sírkő – Palásti és Társa Kft.",
    "description": "Az akciós sírkő oldalon alapvetően kirakatra készített síremlékek láthatók. A téli időszakban készült urna-, szimpla- és dupla sírkövek garantált maximális minőségben készülnek el, anyagát tekintve legyen az gránit, márvány vagy mészkő. Az akciós kirakati termékekre sok esetben 10-, 20- vagy akár 50%-os kedvezményt is tudunk adni. Az általunk készített síremlékek szépségét a belőle kialakított forma és maga az anyag határozza meg."
  }
}
</route>