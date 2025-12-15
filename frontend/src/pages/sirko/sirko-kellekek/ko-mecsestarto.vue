<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kő mécsestartó</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/Sirko-kellekek/ko-mecsestarto.jpg" text="A <span class='text-orange-600 font-semibold'>kő mécsestartó</span> a temető dekorációk egyik legmeghatározóbb kelléke. Eltávozott szerettünk emlékére gyújtott gyertya, vagy mécses az egyik legnagyobb múltra visszatekintő és majd minden kultúrában megtalálható módja a megemlékezésnek. A fény, mint jelkép  fontos kísérője életeseményeinknek. A tisztelet kifejezésének is egy nemzetközi formája a mécses vagy egy szál gyertya gyújtása. A temetői mécsestartó lámpa egyrészt védi az égő gyertyát, másrészt dekorációs célokat szolgál. Leggyakrabban gránitból készítjük, sokféle stílusban, színben, formában, számos felületkezelési eljárással. A lámpa üveglapjaira különböző jeleket, akár vallási jelképeket is gravírozhatunk. Az igényeknek megfelelően azonban már nálunk is kapható bronz mécsestartó is. A kiválasztás szabályai ez esetben is hasonlóak, mint amit a kővázáknál leírtunk, azaz stílusban és színben is illeszkednie kell a síremlékhez. Ahhoz, hogy a temetői mécsestartó lámpák funkciójukat hosszú időn át betölthessék fúrt és ragasztott rögzítési technikát alkalmazva fixáljuk őket." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseAccessoriesCard group="L1" class="mt-12 md:mt-[4rem]"/>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseAccessoriesCard from '@components/BaseAccessoriesCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseAccessoriesCard
  }
}
</script>

<route lang="json">
{
  "name": "sirko-kellekek-ko-mecsestarto",
  "meta": {
    "title": "Kő mécsestartó – Palásti és Társa Kft.",
    "description": "A kő mécsestartó a temető dekorációk egyik legmeghatározóbb kelléke. Eltávozott szerettünk emlékére gyújtott gyertya, vagy mécses az egyik legnagyobb múltra visszatekintő és majd minden kultúrában megtalálható módja a megemlékezésnek. A fény, mint jelkép  fontos kísérője életeseményeinknek. A tisztelet kifejezésének is egy nemzetközi formája a mécses vagy egy szál gyertya gyújtása."
  }
}
</route>