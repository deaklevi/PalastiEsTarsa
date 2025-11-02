<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Urna sírkő 3. csoport
      </h2>
    </div>

    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <!-- Betöltés -->
      <div v-if="loading" class="mt-10 text-gray-500">Betöltés...</div>

      <!-- Üres állapot -->
      <div v-else-if="urnaGroup3.length === 0" class="mt-10 text-gray-400 italic">
        Nincs megjeleníthető sírkő ebben a csoportban.
      </div>

      <!-- Tartalom -->
      <div
        v-else
        class="mt-5 md:mt-10 flex flex-wrap justify-center gap-5 max-w-[1500px]"
      >
        <BaseTombstoneCard
          v-for="item in urnaGroup3"
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
import { useUrnaTombstone } from '@stores/UrnaTombstoneStore.mjs'

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
    ...mapState(useUrnaTombstone, ['urnaTombstones']),
    urnaGroup3() {
      return this.urnaTombstones.filter(
        item => item.group === 'Urna sírkő 3. csoport'
      )
    }
  },
  async mounted() {
    const store = useUrnaTombstone()

    // csak akkor tölt, ha még nincs cache-elve
    if (store.urnaTombstones.length === 0) {
      try {
        await store.getUrnaTombstones()
      } catch (error) {
        console.error('Nem sikerült betölteni az urna sírköveket:', error)
      }
    }

    this.loading = false
  }
}
</script>

<route lang="json">
{
  "name": "urna-sirko-csoport-3",
  "meta": {
    "title": "Urna sírkő csoport 3 – Palásti és Társa Kft.",
    "description": "Az urna sírkő készítésére az utóbbi évtizedekben egyre nagyobb az igény. Ennek oka, hogy a nagyobb városok temetőiben egyre kevesebb a hely, és az urna síremlék mérete jóval kisebb, mint a hagyományos koporsós sírhelyé. Ez a méret is temetőnként változhat. A fotógalériában látható, árcsoportokba osztott, urna síremlék fotók, csak ízelítőt adnak a lehetőségekből. A képeken látható síremlékek formája és a gránit fajtája változtatható, amitől az adott formájú sírkő kerülhet olcsóbb vagy drágább kategóriába."
  }
}
</route>
