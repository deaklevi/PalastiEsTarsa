<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 mb-5 md:mb-10 text-xl font-bold w-full text-center md:text-left">
        Szimpla sírkő 1. csoport
      </h2>
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="SZ1" />
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseTombstoneCard from '@components/BaseTombstoneCard.vue'

export default {
  components: {
    BaseLayout,
    BaseTombstoneCard
  }
}
</script>

<route lang="json">
{
  "name": "szimpla-sirko-csoport-1",
  "meta": {
    "title": "Szimpla sírkő 1 csoport – Palásti és Társa Kft.",
    "description": "A szimpla sírkő, más néven egyes síremlék a leggyakrabban alkalmazott méret. A síremlékek java napjainkban gránitból készül, mert a keménységének köszönhetően örökéletű, és a jelen kor technológiájával és a gyakorlott szakemberek tudásával némiképp könnyen megmunkálható. A gránit síremlék szépségét a belőle kialakított forma és maga az anyag határozza meg. A fotógalériában látható, árcsoportokba osztott, szimpla gránit sírkő fotók, csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy absztrakt alak."
  }
}
</route>
