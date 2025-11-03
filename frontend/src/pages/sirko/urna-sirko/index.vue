<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Urna sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/urna-sirko.jpg" text="Az <span class='text-orange-600 font-semibold'>urna sírkő</span> készítésére az utóbbi évtizedekben egyre nagyobb az igény. Ennek oka, hogy a nagyobb városok temetőiben egyre kevesebb a hely, és az urna síremlék mérete jóval kisebb, mint a hagyományos koporsós sírhelyé. Ez a méret is temetőnként változhat. A fotógalériában látható, árcsoportokba osztott, urna síremlék fotók, csak ízelítőt adnak a lehetőségekből. A képeken látható síremlékek formája és a gránit fajtája változtatható, amitől az adott formájú sírkő kerülhet olcsóbb vagy drágább kategóriába. Előfordulhat, hogy egy legdrágább kategóriájú síremlékforma, olcsóbb, de mégis garantáltan tökéletes minőségű gránitból készül, a legolcsóbb kategóriába kerülhet. Ebben az esetben inkább a kőből kialakított forma van hangsúlyozva. Ellenkező példa esetén, ha prémium kategóriás gránitból, egyszerű formájú sírkő készül, átkerülhet a legdrágább árkategóriába. Valakinek a gránit fajtája a meghatározó a síremlék kiválasztásakor, más egy elképzelt formát szeretne megvalósítani. Cégünknél nincs minőségi megkülönböztetés árkategóriák szerint, azaz a legegyszerűbb kivitelű síremléket is, maximális minőségi elvárásoknak vetjük alá. A forma kiválasztásához még több segítséget tudunk nyújtani irodánkban, bő katalógus kínálatunkból." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-52 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Sirko/Urna-sirko/urna-sirko-1.png" title="Urna sírkő 1. csoport" :link="{name: 'urna-sirko-csoport-1'}" />
        <BaseTitleCard image="../../public/Sirko/Urna-sirko/urna-sirko-2.png" title="Urna sírkő 2. csoport" :link="{name: 'urna-sirko-csoport-1'}" />
        <BaseTitleCard image="../../public/Sirko/Urna-sirko/urna-sirko-3.png" title="Urna sírkő 3. csoport" :link="{name: 'urna-sirko-csoport-1'}" />
        <BaseTitleCard image="../../public/Sirko/Urna-sirko/urna-sirko-4.png" title="Urna sírkő 4. csoport" :link="{name: 'urna-sirko-csoport-1'}" />
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
  "name": "urna-sirko",
  "meta": {
    "title": "Urna sírkő – Palásti és Társa Kft.",
    "description": "Az urna sírkő készítésére az utóbbi évtizedekben egyre nagyobb az igény. Ennek oka, hogy a nagyobb városok temetőiben egyre kevesebb a hely, és az urna síremlék mérete jóval kisebb, mint a hagyományos koporsós sírhelyé. Ez a méret is temetőnként változhat. A fotógalériában látható, árcsoportokba osztott, urna síremlék fotók, csak ízelítőt adnak a lehetőségekből. A képeken látható síremlékek formája és a gránit fajtája változtatható, amitől az adott formájú sírkő kerülhet olcsóbb vagy drágább kategóriába."
  }
}
</route>