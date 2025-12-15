<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 mb-5 md:mb-10 text-xl font-bold w-full text-center md:text-left">
        Dupla sírkő 3. csoport
      </h2>
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="D3" />
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
  "name": "dupla-sirko-csoport-3",
  "meta": {
    "title": "Dupla sírkő 3 csoport – Palásti és Társa Kft.",
    "description": "A dupla sírkő, más néven kettes síremlék formailag több lehetőséget ad – nagyobb alapterületének köszönhetően – a különleges formák megvalósításához. A síremlékek java napjainkban gránitból készül, mert a keménységének köszönhetően örökéletű, és a jelen kor technológiájával és a gyakorlott szakemberek tudásával némiképp könnyen megmunkálható. A gránit síremlék szépségét a belőle kialakított forma és maga az anyag határozza meg. A fotógalériában látható, árcsoportokba osztott, dupla gránit sírkő fotók, csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy absztrakt alak."
  }
}
</route>
