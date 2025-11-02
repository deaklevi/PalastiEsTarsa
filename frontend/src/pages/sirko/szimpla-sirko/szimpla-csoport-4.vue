<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Szimpla sírkő 4. csoport
      </h2>
    </div>

    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div v-if="loading" class="mt-10 text-gray-500">Betöltés...</div>

      <div v-else-if="urnaGroup4.length === 0" class="mt-10 text-gray-400 italic">
        Nincs megjeleníthető sírkő ebben a csoportban.
      </div>

      <div
        v-else
        class="mt-5 md:mt-10 flex flex-wrap justify-center gap-5 max-w-[1500px]"
      >
        <BaseTombstoneCard
          v-for="item in urnaGroup4"
          :key="item.id"
          :item="item"
        />
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseTombstoneCard from '@components/BaseTombstoneCard.vue'
import { mapState } from 'pinia'
import { useSzimplaTombstone } from '@stores/SzimplaTombstoneStore.mjs'

export default {
  components: {
    BaseLayout,
    BaseTombstoneCard
  },
  data() {
    return {
      loading: true
    }
  },
  computed: {
    ...mapState(useSzimplaTombstone, ['szimplaTombstones']),
    urnaGroup4() {
      return this.szimplaTombstones.filter(
        item => item.group === 'Szimpla sírkő 4. csoport'
      )
    }
  },
  async mounted() {
    const store = useSzimplaTombstone()
    if (store.szimplaTombstones.length === 0) {
      try {
        await store.getSzimplaTombstones()
      } catch (e) {
        console.error('Nem sikerült betölteni a sírköveket:', e)
      }
    }
    this.loading = false
  }
}
</script>

<route lang="json">
{
  "name": "szimpla-sirko-csoport-4",
  "meta": {
    "title": "Szimpla sírkő csoport 4 – Palásti és Társa Kft.",
    "description": "A szimpla sírkő, más néven egyes síremlék a leggyakrabban alkalmazott méret. A síremlékek java napjainkban gránitból készül, mert a keménységének köszönhetően örökéletű, és a jelen kor technológiájával és a gyakorlott szakemberek tudásával némiképp könnyen megmunkálható. A gránit síremlék szépségét a belőle kialakított forma és maga az anyag határozza meg. A fotógalériában látható, árcsoportokba osztott, szimpla gránit sírkő fotók, csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy absztrakt alak."
  }
}
</route>
