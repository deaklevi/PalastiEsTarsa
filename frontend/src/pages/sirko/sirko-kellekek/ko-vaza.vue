<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kő váza</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/Sirko-kellekek/ko-vaza.jpg" text="A <span class='text-orange-600 font-semibold'>kőváza</span> tökéletes kiegészítője minden síremléknek. Az esetek döntő többségében párosával vásárolják, hogy az emlék mindkét oldala egyformán díszes legyen. Sírkőváza többféle anyagból, sokféle stílusban, színben, formában, számos felületkezelési eljárással készülhet. Oldalunkon csak a legnépszerűbb termékeinket mutatjuk be, melyek gránit alapanyagúak. Ez a kőfajta ellenáll az időjárás károsító hatásainak és fagyálló is. A vázákba műanyag betétet helyeztünk el, így könnyen tisztíthatóvá váltak. Süllyesztett kivitelben kizárólag bronz sirkővázák kerülnek a síremlékeken elhelyezésre. Felhívjuk kedves vásárlóink figyelmét, hogy minden sírkő kellékünk KIZÁRÓLAG SÍRKŐVEL EGYÜTT rendelhető! A kiválasztásnál érdemes legalább két tényezőt figyelembe venni. Az első, s egyben a legfontosabb szempont, hogy a kőváza stílusában és színében illeszkedjék a síremlékhez. Amennyiben Ön bizonytalan döntését illetően, forduljon segítségért munkatársainkhoz! A másik szempont e vázák rögzítése. Időtlen idők óta hagyomány, hogy vágott virágot viszünk elhunyt szerettünk sírjára. Ahhoz, hogy e kővázák funkciójukat hosszú időn át betölthessék fúrt és ragasztott rögzítési technikát alkalmazva fixáljuk őket." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseAccessoriesCard group="NR1" class="mt-12 md:mt-[10.5rem]"/>
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
  "name": "sirko-kellekek-ko-vaza",
  "meta": {
    "title": "Kő váza – Palásti és Társa Kft.",
    "description": "A kőváza tökéletes kiegészítője minden síremléknek. Az esetek döntő többségében párosával vásárolják, hogy az emlék mindkét oldala egyformán díszes legyen. Sírkőváza többféle anyagból, sokféle stílusban, színben, formában, számos felületkezelési eljárással készülhet. Oldalunkon csak a legnépszerűbb termékeinket mutatjuk be, melyek gránit alapanyagúak. Ez a kőfajta ellenáll az időjárás károsító hatásainak és fagyálló is."
  }
}
</route>