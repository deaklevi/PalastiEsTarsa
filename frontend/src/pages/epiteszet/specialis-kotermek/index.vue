<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Speciális kőtermék
      </h2>
    </div>

    <!-- Itt már csak a komponens -->
    <BaseArchitectureCard group="specialiskotermek" />
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseArchitectureCard from '@components/BaseArchitectureCard.vue'

export default {
  components: {
    BaseLayout,
    BaseArchitectureCard
  }
}
</script>

<route lang="json">
{
  "name": "epiteszet-specialiskotermek",
  "meta": {
    "title": "Speciális kőtermék – Palásti és Társa Kft.",
    "description": "Az építészet kihagyhatatlan szerkezeti és díszítő eleme, évezredek óta a kő. Következésképp egyrészről a művészetek egyik ága (alkalmazott művészet), másrészről mérnöki tudomány, technológiai szaktudomány. A humán kultúra, az emberi tevékenység egyik legalapvetőbb megjelenési formája. Az embert körülvevő természeti környezet akaratlagos megváltoztatása. Az építészet témaköréhez elválaszthatatlanul kapcsolódik az építés fogalomköre. Mindenképp fontos viszont különbséget tenni, s ez a különbség alapvetően az esztétika és a technológiai igény mértékében érhető tetten. Az épületek megépítésén kívül építészetnek nevezzük a belső terek kialakításától kezdve (belsőépítészet) egészen a városi-, esetenként regionális léptékig terjedő építészetet (városépítészet, urbanisztika) is. Az oldalon feltüntetett témakörök magukba foglalják tevékenységünk jelentős részét. Mondhatni, lehetőségünk és tehetségünk van elkészíteni akár egy egyszerű ablakpárkányt vagy egy bonyolult, több elemből álló specifikus kompozíciót is."
  }
}
</route>
