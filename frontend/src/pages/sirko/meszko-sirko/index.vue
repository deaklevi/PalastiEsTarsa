<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 mb-5 md:mb-10 text-xl font-bold w-full text-center md:text-left">Mészkő sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 mb-5 md:mb-10 max-w-[1500px]" image="../../public/Sirko/meszko-sirko.jpg" text="A <span class='text-orange-600 font-semibold'>mészkő síremlék</span> legmegszokottabb formája a sziklás, rusztikus megjelenítés. A mészkő bányákban található kisebb-nagyobb sziklák is megtalálják helyüket a világban. Ha mégis formázni, faragni kell a követ, a kőfaragó vagy a kőszobrász könnyedén megoldja a feladatot. Tudni kell, hogy a mészkő, természeténél fogva kényes a külső környezeti hatásokra. Rövid idő alatt elveszíti üvegfényét az erős napsütés, savas eső és fagy hatására. Ezért a mészkő szépségét nem a fényezett felület határozza meg, hanem a természetessége, a belőle kialakított forma és maga az anyag. Ha valaki ragaszkodik a mészkő nyersanyaghoz, javaslom, hogy az alábbi formák közül, vagy hasonló stílusú síremlékben gondolkozzon. A márvány síremlék galériában látható alkotások is elkészíthetőek mészkőből. A mészkő, mint kőzet „engedi”, hogy formabontó, szinte már szobrászalkotások készüljenek belőle. Nem véletlen, hogy a kőszobrászok anyag választása sok esetben a mészkő. A fotógalériában látható mészkő síremlék fotók csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy nonfiguratív alak." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseTombstoneCard group="NM1" class="mt-12 md:mt-[4rem]"/>
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
  "name": "meszko-sirko",
  "meta": {
    "title": "Mészkő sírkő – Palásti és Társa Kft.",
    "description": "A mészkő síremlék legmegszokottabb formája a sziklás, rusztikus megjelenítés. A mészkő bányákban található kisebb-nagyobb sziklák is megtalálják helyüket a világban. Ha mégis formázni, faragni kell a követ, a kőfaragó vagy a kőszobrász könnyedén megoldja a feladatot. Tudni kell, hogy a mészkő, természeténél fogva kényes a külső környezeti hatásokra. Rövid idő alatt elveszíti üvegfényét az erős napsütés, savas eső és fagy hatására. Ezért a mészkő szépségét nem a fényezett felület határozza meg, hanem a természetessége, a belőle kialakított forma és maga az anyag."
  }
}
</route>