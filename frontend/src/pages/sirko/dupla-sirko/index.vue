<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 mb-5 md:mb-10 text-xl font-bold w-full text-center md:text-left">Dupla sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 mb-5 md:mb-10 max-w-[1500px]" image="../../public/Sirko/dupla-sirko.jpg" text="A <span class='text-orange-600 font-semibold'>dupla sírkő</span>, más néven kettes síremlék formailag több lehetőséget ad – nagyobb alapterületének köszönhetően – a különleges formák megvalósításához. A síremlékek java napjainkban gránitból készül, mert a keménységének köszönhetően örökéletű, és a jelen kor technológiájával és a gyakorlott szakemberek tudásával némiképp könnyen megmunkálható. A gránit síremlék szépségét a belőle kialakított forma és maga az anyag határozza meg. A fotógalériában látható, árcsoportokba osztott, dupla gránit sírkő fotók, csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy absztrakt alak. A képeken látható síremlékek formája, gránit fajtája változtatható, amitől az adott formájú sírkő kerülhet olcsóbb vagy drágább kategóriába. Cégünknél nincs minőségi megkülönböztetés árkategóriák szerint, azaz a legegyszerűbb kivitelű síremléket is, maximális minőségi elvárásoknak vetjük alá. Előfordulhat, hogy egy legdrágább kategóriájú síremlékforma, olcsóbb, de mégis garantáltan tökéletes minőségű gránitból készül, a legolcsóbb kategóriába kerülhet. Ebben az esetben inkább a kőből kialakított forma van hangsúlyozva. Ellenkező példa esetén, ha prémium kategóriás gránitból, egyszerű formájú sírkő készül, átkerülhet a legdrágább árkategóriába. Valakinek a gránit fajtája a meghatározó a síremlék kiválasztásakor. A forma kiválasztásához több segítséget tudunk nyújtani irodánkban, bő katalógus kínálatunkból." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-[4rem] flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Sirko/Dupla-sirko/dupla-sirko-1.png" title="Szimpla sírkő 1. csoport" :link="{name: 'dupla-sirko-csoport-1'}" />
        <BaseTitleCard image="../../public/Sirko/Dupla-sirko/dupla-sirko-2.png" title="Szimpla sírkő 2. csoport" :link="{name: 'dupla-sirko-csoport-2'}" />
        <BaseTitleCard image="../../public/Sirko/Dupla-sirko/dupla-sirko-3.png" title="Szimpla sírkő 3. csoport" :link="{name: 'dupla-sirko-csoport-3'}" />
        <BaseTitleCard image="../../public/Sirko/Dupla-sirko/dupla-sirko-4.png" title="Szimpla sírkő 4. csoport" :link="{name: 'dupla-sirko-csoport-4'}" />
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
  "name": "dupla-sirko",
  "meta": {
    "title": "Dupla sírkő – Palásti és Társa Kft.",
    "description": "A dupla sírkő, más néven kettes síremlék formailag több lehetőséget ad – nagyobb alapterületének köszönhetően – a különleges formák megvalósításához. A síremlékek java napjainkban gránitból készül, mert a keménységének köszönhetően örökéletű, és a jelen kor technológiájával és a gyakorlott szakemberek tudásával némiképp könnyen megmunkálható. A gránit síremlék szépségét a belőle kialakított forma és maga az anyag határozza meg. A fotógalériában látható, árcsoportokba osztott, dupla gránit sírkő fotók, csak némi ízelítőt adnak a formai változatosságról, aminek csak a képzelőerő és a fizika szabhat határt. Legyen az valós vagy absztrakt alak."
  }
}
</route>