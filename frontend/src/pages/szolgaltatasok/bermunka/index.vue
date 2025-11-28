<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Bérmunka
      </h2>
    </div>

    <div class="w-full overflow-x-auto">
      <table class="mt-5 md:mt-10 mb-24 md:mb-52 mx-auto min-w-[768px]">
      <thead class="w-full bg-orange-600 text-center">
        <tr>
          <th class="px-[50px] py-2">Munka</th>
          <th class="px-[50px] py-2">Anyag</th>
          <th class="px-[50px] py-2">Méret</th>
          <th class="px-[50px] py-2">Árak</th>
        </tr>
      </thead>
      <tbody class="w-full">
        <tr v-for="(work, index) in works" :key="work.id" :class="index % 2 === 0 ? 'bg-white' : 'bg-neutral-800 text-white'" class="" >
          <td class="px-4 py-2">{{ work.type }}</td>
          <td class="px-4 py-2">{{ work.stone_type }}</td>
          <td class="px-4 py-2">{{ work.size }}</td>
          <td class="pr-4 py-2 text-right">{{ work.price }} Ft/m<sup>2</sup></td>
        </tr>
        <tr v-if="works.length === 0">
          <td colspan="4" class="text-center py-2">Nincs elérhető adat</td>
        </tr>
      </tbody>
    </table>
    </div>
    
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import { mapState } from 'pinia'
import { useWork } from '@stores/WorkStore.mjs'

export default {
  components: {
    BaseLayout
  },
  computed: {
    ...mapState(useWork, ['works'])
  },
  mounted() {
    if (!this.works.length) {
      useWork().getWorks()
    }
  }
}
</script>

<route lang="json">
{
  "name": "szolgaltatasok-bermunka",
  "meta": {
    "title": "Bérmunka – Palásti és Társa Kft.",
    "description": "A szolgáltatások oldalon bemutatjuk a síremlék és egyéb építészeti munkálatokhoz tartozó tevékenységi körünket, amivel professzionálisan eleget tehetünk az egyre inkább gyakori különleges igényeknek. Ehhez rendelkezésre álnak megfelelő hardverek, szoftverek és a nélkülözhetetlen szakmai potencia."
  }
}
</route>
