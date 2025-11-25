<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Szolgáltatások
      </h2>
    </div>

    <div class="flex flex-col items-center xl:items-start mt-5 md:mt-10 xl:flex-row xl:justify-between lg:mx-12">
      <div class="max-w-[600px] mb-24 md:mb-52  mx-5">
        <p class="ml-5">
          A <span class="text-orange-600 font-semibold">szolgáltatások</span> oldalon bemutatjuk a síremlék és egyéb építészeti munkálatokhoz tartozó tevékenységi körünket, amivel professzionálisan eleget tehetünk az egyre inkább gyakori különleges igényeknek. Ehhez rendelkezésre álnak megfelelő hardverek, szoftverek és a nélkülözhetetlen szakmai potencia.
          <br><br>
          A 3D-s látványtervezés, ami a sírkő készítők világában egyáltalán nem jellemző. Segítséget nyújt a megrendelőnek és a kivitelezőnek egyaránt.
          <br><br>
          Lézergravírozás gránitba, teljesen más technológiát /specifikus mechanizmust/ igényel, mint más anyagba. Alapvető követelmény a gravírozandó kép minél nagyobb, megfelelő minőségű felbontása.
          <br><br>
          Gépi, műszaki és szakmai felkészültségünknek köszönhetően /hozott anyagból - gránit, márvány, mészkő, homokkő/, bérmunkával is foglalkozunk, mint pl. kőtömb darabolása, tábla felületének kalibrálása, méretre vágása, szélezése, natúr felületek fényezése, rovátkolása, flammolása azaz égetése. 
        </p>
      </div>
      <div class="max-w-[800px]">
        <RouterLink to="#">
            <BaseInfoCard class="mb-5" image="../../public/Szolgaltatasok/3d-tervezes.jpg" text="A <span class='text-orange-600 font-semibold'>3D-s látványtervezés</span> a sírkő készítők világában egyáltalán nem jellemző. Segítséget nyújt a megrendelőnek és a kivitelezőnek egyaránt a komolyabb döntések előtt. Lehetőséget nyújt a „tervező asztal” arra, hogy a megálmodott, elképzelt formákat vizuálisan megjelenítse. Bizonyos szempontból könnyebb egy háromdimenziós látványtervet elkészíteni, mint saját fantázia alapján leképezni azt kétdimenziós térre. Az objektum elkészítésekor, ellentétben a lerajzolásával, nem kell figyelembe venni a perspektíva és a fényviszonyok torzítását. Ezen kívül az is az előnyök közé tartozik, hogy könnyebb a képet módosítani, átrendezni vagy áttervezni. Egy jó kép elkészítéséhez rengeteg technikai háttértudás kell, és egy egyszerű kép létrehozása is meglehetősen összetett folyamat. A 3D technológia előnyei elsősorban részletesen kidolgozott ábrázolások megvalósításánál domborodnak ki." />
        </RouterLink>
        <RouterLink to="#">
            <BaseInfoCard class="mb-5" image="../../public/Szolgaltatasok/lezergravirozas.jpg" text="<span class='text-orange-600 font-semibold'>Lézergravírozás</span> gránitba, teljesen más technológiát /specifikus mechanizmust/ igényel, mint más anyagba. Alapvető követelmény a gravírozandó kép minél nagyobb, megfelelő minőségű felbontása. A gránitba történő lézergravírozás során egy koncentrált lézersugár hatására az anyag „felrobban”. Ezzel rendkívül tartós, jól látható és olvasható felirat, logó, kép, portré, sorszám vagy akár vonalkód és QR-kód is készíthető. Felhasználási módja rendkívül széles körű. Leggyakrabban személyre szóló ajándéktárgyakat készítenek, de ipari körökben gravírozással történhet a különböző eszközök márkanévvel történő ellátása, szerszámok, vagy alkatrészek sorszámozása. A lézersugár tulajdonságainak köszönhetően apró felületekre is nagy pontossággal lehet gravírozni." />
        </RouterLink>
        <RouterLink to="#">
            <BaseInfoCard class="mb-5" image="../../public/Szolgaltatasok/bermunka.jpg" text="Gépi, műszaki és szakmai felkészültségünknek köszönhetően / hozott anyagból - gránit, márvány, mészkő, homokkő /, <span class='text-orange-600 font-semibold'>bérmunkával</span> is foglalkozunk. Nagyméretű, bányászott kőtömbből kivágjuk a kívánt méretű táblákat vagy alakzatot. Az így kapott táblák felületkezelését is meg tudjuk oldani. Kalibrálás, precíziós sík felület kialakítása   -   matt felület képzés, polírozás, fényezés   -   rovátkolás, flammolás, azaz égetés. További munkafolyamatok elvégzése, mint   -   méretre vágás, szélezés   -   élek fózolása és fényezése vagy faragása, azaz sprengelése is megoldható." />
        </RouterLink>
      </div>
    </div>
    
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard
  }
}
</script>

<route lang="json">
{
  "name": "szolgaltatasok",
  "meta": {
    "title": "Szolgáltatások – Palásti és Társa Kft.",
    "description": "A szolgáltatások oldalon bemutatjuk a síremlék és egyéb építészeti munkálatokhoz tartozó tevékenységi körünket, amivel professzionálisan eleget tehetünk az egyre inkább gyakori különleges igényeknek. Ehhez rendelkezésre álnak megfelelő hardverek, szoftverek és a nélkülözhetetlen szakmai potencia."
  }
}
</route>
