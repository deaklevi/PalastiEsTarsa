<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Urna sírkő 3. csoport</h2>
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-5 md:mt-10 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseProductCard v-for="item in urnaGroup3" :key="item.order" :item="item" />
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseProductCard from '@components/BaseProductCard.vue'
import { mapState } from 'pinia'
import { useUrnaTombstone } from '@stores/UrnaTombstone.mjs'

export default {
  components: {
    BaseLayout,
    BaseProductCard
  },
  computed: {
    ...mapState(useUrnaTombstone, ["urnaTombstones"]),
    urnaGroup3() {
    return this.urnaTombstones.filter(item => item.group === "Urna sírkő 3. csoport")
    }
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