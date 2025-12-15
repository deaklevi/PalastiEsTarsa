<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 mb-5 md:mb-10 text-xl font-bold w-full text-center md:text-left">Márvány sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 mb-5 md:mb-10 max-w-[1500px]" image="../../public/Sirko/marvany-sirko.jpg" text="A <span class='text-orange-600 font-semibold'>márvány sírkőről</span> mindenkinek a „nemes anyag” jut eszébe. Tudni kell, hogy a márvány, természeténél fogva kényes a külső környezeti hatásokra. Rövid idő alatt elveszíti üvegfényét az erős napsütés, savas eső és fagy hatására. Ezért a márvány szépségét nem a fényezett felület határozza meg, hanem a belőle kialakított forma és maga az anyag. Ha valaki ragaszkodik a márvány nyersanyaghoz, javaslom, hogy az alábbi formák közül, vagy hasonló stílusú síremlékben gondolkozzon. A márvány, mint kőzet „engedi”, hogy formabontó, szinte már szobrászalkotások készüljenek belőle. Nem véletlen, hogy a kőszobrászok anyag választása legtöbbször a márvány. A fotógalériában látható márvány síremlék fotók csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy nonfiguratív alak. Ezeknek az emlékeknek a tervezése papíron kezdődik. Ha a kialakítandó forma koncepcióját az alkotó megérti, „könnyebben szalad a ceruza”. Ha valaki konkrét elképzeléssel érkezik, szobrászaink azt is megvalósítják. Az anyag kiválasztása is fontos része ezeknek az alkotásoknak, mert meghatározhatja a teljes kompozíciót." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="ME1" class="mt-12 md:mt-[4rem]"/>
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
  "name": "marvany-sirko",
  "meta": {
    "title": "Márvány sírkő – Palásti és Társa Kft.",
    "description": "A márvány sírkőről mindenkinek a „nemes anyag” jut eszébe. Tudni kell, hogy a márvány, természeténél fogva kényes a külső környezeti hatásokra. Rövid idő alatt elveszíti üvegfényét az erős napsütés, savas eső és fagy hatására. Ezért a márvány szépségét nem a fényezett felület határozza meg, hanem a belőle kialakított forma és maga az anyag. Ha valaki ragaszkodik a márvány nyersanyaghoz, javaslom, hogy az alábbi formák közül, vagy hasonló stílusú síremlékben gondolkozzon. A márvány, mint kőzet „engedi”, hogy formabontó, szinte már szobrászalkotások készüljenek belőle."
  }
}
</route>