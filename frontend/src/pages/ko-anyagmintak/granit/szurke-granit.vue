<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Szürke gránit</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Granit/szurke.jpg" text="A <span class='text-orange-600 font-semibold'>szürke gránit</span> is magmás eredetű kőzet, mint bármely másik színű. A „gránit” egy gyűjtő név, amit az alkotó ásványok és kristályok előfordulásának változatossága tesz különbözővé, változatossá. Színét általában a földpátok, azaz kőzetalkotó ásványok határozzák meg. Kevesebb kvarcot tartalmazó típusa a granoszienit, a kvarc nélkül, nagyobbrészt földpátokból álló kőzet a szienit. Az olyan, kevés káliumot, de a szokásosnál több nátriumot és kalciumot tartalmazó gránitot, amiben a káliföldpát nincs vagy mennyisége csekély, és helyette plagioklászt találunk, plagiogránitnak nevezzük. A szürke gránitok színét alapvetően az apatit, andaluzit, kalcit, titanit, hematit, grafit és az áttetsző szürkés kvarc határozzák meg. Rajzolatát és struktúráját tekintve, többségében homogén szerkezetű, de a fotógalériában bemutatott szürke gránitok között látható nagy csillámos és felhős rajzolatú is. A felhasználási terület nagyon különböző és változatos, mert a tulajdonságaikat (nedvszívó képesség, nyomó szilárdság, stb.) figyelembe véve egyes gránit fajták nem alkalmazhatóak minden területen. Kérem, tekintse meg kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="szurke-granit" class="mt-12 md:mt-[4rem]"/>

  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseStoneCard from '@components/BaseStoneCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseStoneCard
  }
}
</script>

<route lang="json">
{
  "name": "ko-anyagminta-szurke-granit",
  "meta": {
    "title": "Szürke gránit – Palásti és Társa Kft.",
    "description": "A szürke gránit is magmás eredetű kőzet, mint bármely másik színű. A „gránit” egy gyűjtő név, amit az alkotó ásványok és kristályok előfordulásának változatossága tesz különbözővé, változatossá. Színét általában a földpátok, azaz kőzetalkotó ásványok határozzák meg. Kevesebb kvarcot tartalmazó típusa a granoszienit, a kvarc nélkül, nagyobbrészt földpátokból álló kőzet a szienit."
  }
}
</route>