<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Sírkő kellékek</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/sirko-kellekek.jpg" text="A <span class='text-orange-600 font-semibold'>sírkő kellékek</span>, kiegészítők országonként, vallásonként különböző temetkezési szokások és változó sírkő kultúra szerint alkalmazzák. A jelen kor széles körű igényeinek megfelelően bő választékunkból tudjuk kielégíteni az egyedi igényeket. Alapvetően két féle anyagból készülnek. Bronzból és kőből. Az általunk forgalmazott bronz termékek, speciális eljárással vannak védve a korróziótól, így a változatos időjárásnak kitéve nem színesedik el és nem folyik meg a kövön. Funkciójukat tekintve nagyon sok féle kiegészítőt használunk hazánkban. Az alábbi oldalon - anyag és rendeltetés szerint külön válogatva – kereshet vallási jelképek, süllyesztett és hagyományos vázák és mécses tartó lámpák, térplasztikák és szobrok közül az igényeknek legmegfelelőbbet. A minőség és forma választásánál ügyelni kell arra, hogy a tervezett síremlékre, stílusban hozzá illő legyen.  A rögzítésre különös figyelmet fektetünk, hogy az erősebb külső erőhatásnak is ellen álljon. A kőből készült kiegészítőkről készült fotók illusztrációk, a vázák, mécses tartók és virágtartók szinte az összes - általunk sírkő alapanyagnak javasolt - kőből elkészíthetőek." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-52 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseTitleCard image="../../public/Sirko/Sirko-kellekek/ko-vaza.jpg" title="Kő váza" :link="{name: 'sirko-kellekek-ko-vaza'}" />
        <BaseTitleCard image="../../public/Sirko/Sirko-kellekek/ko-mecsestarto.jpg" title="Kő mécsestartó"  :link="{name: 'sirko-kellekek-ko-mecsestarto'}" />
        <BaseTitleCard image="../../public/Sirko/Sirko-kellekek/ko-viragtarto.jpg" title="Kő virágtartó"  :link="{name: 'sirko-kellekek-ko-viragtarto'}" />
        <BaseTitleCard image="../../public/Sirko/Sirko-kellekek/bronz-sirko-kellekek.jpg" title="Bronz sírkő kellékek"  :link="{name: 'urna-sirko'}" />
        <BaseTitleCard image="../../public/Sirko/Sirko-kellekek/sirfelirat.jpg" title="Sírfelirat"  :link="{name: 'urna-sirko'}" />
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
  "name": "sirko-kellekek",
  "meta": {
    "title": "Sírkő kellékek – Palásti és Társa Kft.",
    "description": "A sírkő kellékek, kiegészítők országonként, vallásonként különböző temetkezési szokások és változó sírkő kultúra szerint alkalmazzák. A jelen kor széles körű igényeinek megfelelően bő választékunkból tudjuk kielégíteni az egyedi igényeket. Alapvetően két féle anyagból készülnek. Bronzból és kőből. Az általunk forgalmazott bronz termékek, speciális eljárással vannak védve a korróziótól, így a változatos időjárásnak kitéve nem színesedik el és nem folyik meg a kövön."
  }
}
</route>
