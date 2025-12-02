<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kő anyagminták - Természetes kő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/ko-anyagmintak.jpg" text="A <span class='text-orange-600 font-semibold'>természetes kő</span> képződése szerint három fő csoportba osztható. A <span class='text-orange-600 font-semibold'>magmás kőzetek</span> légnemű és szilárd alkotórészekből álló, többkomponensű, többnyire szilikátos olvadékok kikristályosodásával alakulnak ki. Az olvadékban a gázok és gőzök oldatban tartják a szilárdakat, ezért lehűlés során kristályos szerkezetű lesz. A kristályosodás mélysége szerint megkülönböztetjük a mélységi magmás és kiömlési magmás kőzeteket. Az <span class='text-orange-600 font-semibold'>üledékes kőzetek</span> felszíni (másodlagos) folyamatok, azaz a felszíni vagy felszín közeli kőzetek lepusztulása, mállása, a mállástermék szállítása és lerakódása eredményeként létrejött laza üledékekből képződnek azok kőzetté válásával. A <span class='text-orange-600 font-semibold'>metamorf kőzetek</span> nagy hőmérsékleten és/vagy nyomáson korábbi kőzetek szilárd fázisú átkristályosodással jönnek létre. Az eredeti kőzet jellege szerint megkülönböztetünk orto- (azaz magmás kőzetből képződött) és para- (azaz üledékes kőzetből képződött) metamorfitokat. Ennek megfelelően a Föld felszínének nagyobbik részét laza üledék vagy üledékes kőzetek borítják, lefelé haladva viszont a laza üledékek aránya gyorsan, az üledékes kőzeteké lassabban csökken, a metamorf kőzeteké pedig fokozatosan nő. Mintegy 15 km mélyen már gyakorlatilag csak metamorf kőzeteket találunk. Az általunk forgalmazott köveket az alábbiak szerint csoportosítjuk: gránit, márvány, mészkő, kvarcit és onyx." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-52 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Ko-anyagminta/anyagtar.jpg" title="Anyagtár" :link="{name: 'urna-sirko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/granit.jpg" title="Gránit"  :link="{name: 'urna-sirko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/marvany.jpg" title="Márvány"  :link="{name: 'urna-sirko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/meszko.jpg" title="Mészkő"  :link="{name: 'urna-sirko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/kvarcit.jpg" title="Kvarcit"  :link="{name: 'urna-sirko'}" />
        <BaseTitleCard image="../../public/Ko-anyagminta/onyx.jpg" title="Onyx"  :link="{name: 'urna-sirko'}" />
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
  "name": "ko-anyagminta",
  "meta": {
    "title": "Kő anyagminták – Palásti és Társa Kft.",
    "description": "A természetes kő képződése szerint három fő csoportba osztható. A magmás kőzetek légnemű és szilárd alkotórészekből álló, többkomponensű, többnyire szilikátos olvadékok kikristályosodásával alakulnak ki. Az olvadékban a gázok és gőzök oldatban tartják a szilárdakat, ezért lehűlés során kristályos szerkezetű lesz. A kristályosodás mélysége szerint megkülönböztetjük a mélységi magmás és kiömlési magmás kőzeteket."
  }
}
</route>
