<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Sírfelirat</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/Sirko-kellekek/sirfelirat.jpg" text="A <span class='text-orange-600 font-semibold'>sírfelirat</span> a sírhely személyessé tételére szolgál. Legyen az személynév, becenév, egy gondolat vagy idézet. A kőbe vésett betű ugyan olyan örök, mint maga a kő. Nem csak a jelennek, hanem a jövőnek is szól. Néhány évtizeddel ezelőtt, még mindig csak kézi szerszámok segítségével vésték, faragták a betűket. Az új technológiáknak köszönhetően több gépesített módszer is létezik, de a legpraktikusabb az un. „homokfújt”, amit cégünk is alkalmaz. A modern igényekhez igazodva a plasztikus, sík felületből kiálló fém (bronz) betűket is alkalmazzuk mészkőre, márványra, ill. gránitra is. A feliratozás karakterét és színét mindig az adott síremlék formája és anyaga határozza meg, mert a cél az, hogy olvasható legyen. A kő anyagnak és a felirat színének praktikusan kontrasztosnak kell lennie. Világos anyaghoz sötét, sötét anyaghoz világos felirat javasolt. Az alábbi galériában ez jól érzékelhető. A képeken látható betűtípusokat használjuk általában, de a számítógépnek köszönhetően sok ezer féle karaktert tudunk alkalmazni, a különleges igényeknek megfelelően. A latin betűk mellett, bármilyen más típusú feliratot is tudunk készíteni. A bronz felirat típusokat illetően több információt kaphat a sírkő kiegészítők link alatt a bronz termékeknél." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseAccessoriesCard group="sirfelirat" class="mt-12 md:mt-[4rem]"/>

    <div class="flex flex-col w-full items-center mb-24 md:mb-52">
        <div class="flex flex-col items-center bg-neutral-800 border-2 border-orange-600 p-5 md:p-2 md:flex-row md:items-start max-w-[1500px] md:mx-12">
            <p class="md:ml-5 text-sm text-white text-left max-w-[500px] md:max-w-max">
                <span class="text-orange-600 font-semibold text-base">Gyártási technológia</span>
                <br><br>
                <span class="text-orange-600 font-semibold">1. Homokfújt:</span>
                A megfelelő szoftverrel elkészítjük a vizuális változatot, megfelelő méretben és típusban. A kivágó plotter egy speciális „késsel” egy különleges fóliába kivágja a feliratot. Ezt követően az öntapadós fóliát felragasztjuk a kőre. A marni való részről a felesleges fóliát eltávolítjuk. Magas nyomáson, nagy sebességgel ütköztetjük a szemcséket a kővel, ezáltal a felület maródik. Az utolsó fázis a betűk színezése igény szerint.
                <br><br>
                <span class="text-orange-600 font-semibold">2. Homokfújt felirat típusok:</span>
                Aranyozott, vagy egyéb színre festett betű – a mart felületre több rétegben felhordjuk az adott színű festéket, pl: fekete, ezüst, bronz vagy fehér. Natúr – a mart felületet érintetlenül hagyjuk. Ez esetben párás, nedves időben a felirat olvashatatlan lesz. A probléma kiküszöbölésére ajánljuk az egészen egyszerű fehér festék permetet, ami már olvashatóvá teszi a feliratot nyirkos időben is. Relief – a karakter körülötti mezőt, udvart marjuk fel, ezáltal olyan hatást érünk el, mintha kiemelkedne a felirat az adott síkból. Az erősebb kontraszt elérése végett fehér festékkel „permetezzük” a hátteret, így az olvashatóság maradéktalan.
                <br><br>
                <span class="text-orange-600 font-semibold">3. Fúrt és ragasztott bronz:</span>
                Az általunk forgalmazott bronz termékek, speciális eljárással vannak védve a korróziótól. A kiválasztott típushoz tartozik egy fúrósablon. Ez azért szükséges, mivel minden betű hátulján található un. csap. A furat 1cm mély. Tisztítás és szárítás után a lyukba erős kőragasztó kerül, majd a betű. Az utolsó fázis a kitüremkedett ragasztó eltávolítása.
            </p>
        </div>
    </div>
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
  "name": "sirko-kellekek-sirfelirat",
  "meta": {
    "title": "Sírfelirat – Palásti és Társa Kft.",
    "description": "A sírfelirat a sírhely személyessé tételére szolgál. Legyen az személynév, becenév, egy gondolat vagy idézet. A kőbe vésett betű ugyan olyan örök, mint maga a kő. Nem csak a jelennek, hanem a jövőnek is szól. Néhány évtizeddel ezelőtt, még mindig csak kézi szerszámok segítségével vésték, faragták a betűket. Az új technológiáknak köszönhetően több gépesített módszer is létezik, de a legpraktikusabb az un. „homokfújt”, amit cégünk is alkalmaz."
  }
}
</route>