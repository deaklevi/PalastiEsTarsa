<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Gránit</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/granit.jpg" text="A <span class='text-orange-600 font-semibold'>gránit</span> a leggyakoribb magmás kőzet, ami a magma megszilárdulásával jön létre. A magma, más néven kőzetolvadék folyékony halmazállapotú, a kőzetburok alsóbb részeiben, általában 70 km-nél mélyebb rétegekben képződik. Ha a magma a földfelszín alatt szilárdul meg mélységimagmáskőzetekről beszélünk.A mélyben lassú a kihűlés folyamata (több millió év is lehet), így a magmából kikristályosodó ásványok sokáig épülhetnek, nagyra növekedhetnek. A plutoni kőzetek ezért durván kristályosak. Ha a magma kijut a földfelszínre láváról beszélünk. A kilépés helyén tűzhányó, más néven vulkán alakul ki. A láva kihűlésével keletkező kőzetek a <span class='text-orange-600 font-semibold'>kiömlési magmáskőzetek</span>.A láva kihűlése igen gyors – akár néhány óra alatt is végbemehet, nagy kristályok felépülésére így nincs lehetőség. A vulkáni kőzetek ezért apró kristályosak.A gránitok sokszínűségének az oka a kőzetek eltérő ásványi összetétele. A magmás kőzetek csoportosításának másik nagyon fontos szempontja a kőzetben jelenlévő ásványok, illetve ezek arányának ismerete.<br>A magmás kőzeteket felépítő szilikátásványok két csoportra oszthatók: <br>a) színes elegyrészekre (zöldes, feketés színű ásványok), <br>b) színtelen ásványokra (fehér színű, rózsaszínes, halványkék, vagy színtelen ásványok). A színtelen ásványok közül az ún. földpátfélék a legfontosabbak. <br>A kontinenseken található gránit bányák, mind eltérő színű és struktúrájú nyersanyagot ad. <br>A gyémánt után a második legkeményebb kőzet, így érthető, hogy a megmunkálása csak gyémánt szerszámokkal lehetséges. <br><br>Az alábbi galériában szín szerinti csoportokba osztottuk a gránit fajtákat, hogy célirányosabban találja meg az Ön elképzelésének legmegfelelőbbet." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-12 md:mt-[4rem] flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/feher.jpg" title="Fehér" :link="{name: 'ko-anyagminta-feher-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/sarga.jpg" title="Sárga" :link="{name: 'ko-anyagminta-sarga-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/barna.jpg" title="Barna" :link="{name: 'ko-anyagminta-barna-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/voros.jpg" title="Vörös" :link="{name: 'ko-anyagminta-voros-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/rozsaszin.jpg" title="Rózsaszín" :link="{name: 'ko-anyagminta-rozsaszin-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/zold.jpg" title="Zöld" :link="{name: 'ko-anyagminta-zold-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/szurke.jpg" title="Szürke" :link="{name: 'ko-anyagminta-szurke-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/fekete.jpg" title="Fekete" :link="{name: 'ko-anyagminta-fekete-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/kek.jpg" title="Kék" :link="{name: 'ko-anyagminta-kek-granit'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/Granit/multicolor.jpg" title="Multicolor" :link="{name: 'ko-anyagminta-multicolor-granit'}" />
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseTitleCard from '@components/BaseTitleCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseTitleCard
  }
}
</script>

<route lang="json">
{
  "name": "ko-anyagminta-granit",
  "meta": {
    "title": "Gránit – Palásti és Társa Kft.",
    "description": "A gránit a leggyakoribb magmás kőzet, ami a magma megszilárdulásával jön létre. A magma, más néven kőzetolvadék folyékony halmazállapotú, a kőzetburok alsóbb részeiben, általában 70 km-nél mélyebb rétegekben képződik. Ha a magma a földfelszín alatt szilárdul meg mélységimagmáskőzetekről beszélünk. A mélyben lassú a kihűlés folyamata (több millió év is lehet), így a magmából kikristályosodó ásványok sokáig épülhetnek, nagyra növekedhetnek."
  }
}
</route>
