<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Sírkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Sirko/sirko.jpg" text="A <span class='text-orange-600 font-semibold'>sírkő</span> a szeretet és tisztelet kifejezése elhunyt hozzátartozónk iránt, egyben jelöli végső nyughelyét; egy utolsó tisztelgés annak emléke előtt, aki már nem lehet velünk. Nekünk, embereknek szükségünk van egy ilyen helyre, ahol emlékezhetünk, egy helyre, ahova visszatérhetünk, egy látható jelre, mely a szeretet, a tisztelet és az elismerés jele, mely az elhunyt életének állít emléket.Minden megrendelőnknek az a vágya – melyért mi magunk is mindent megteszünk -, hogy tartós, szép, valamint biztonságos végső nyughelyet biztosítson elhunyt családtagja számára. Ennek a célnak az elérése érdekében néhány alapvető kérdést minden esetben tisztázni kell, mielőtt síremléket rendelne. Mi összegyűjtöttük ezeket, és az egyéb információk oldalon megosztjuk önnel.<br/><br/><span class='text-orange-600 font-semibold'>Szállítás díjmentesen:</span> - 50km-es körzetben - 100km-en belül, 300e Ft feletti vásárlás esetén - 100km-en kívül, 400e Ft feletti vásárlás esetén.<br/><br/><span class='text-orange-600 font-semibold'>Garancia:</span> - síremlékre 5 év - süllyedésre 2 év." />
    </div>
    <div class="flex flex-col items-center mx-5 md:mx-12 mb-24 md:mb-52">
      <div class="mt-24 md:mt-52 flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseCard image="../../public/Sirko/sirko.jpg" title="Urna Sírkő" />
        <BaseCard image="../../public/Sirko/szimpla-sirko.jpg" title="Szimpla Sírkő" />
        <BaseCard image="../../public/Sirko/dupla-sirko.jpg" title="Dupla Sírkő" />
        <BaseCard image="../../public/Sirko/kripta.jpg" title="Kripta" />
        <BaseCard image="../../public/Sirko/akcios-sirko.jpg" title="Akciós Sírkő" />
        <BaseCard image="../../public/Sirko/marvany-sirko.jpg" title="Márvány Sírkő" />
        <BaseCard image="../../public/Sirko/meszko-sirko.jpg" title="Mészkő Sírkő" />
        <BaseCard image="../../public/Sirko/kulonleges-sirko.jpg" title="Különleges Sírkő" />
        <BaseCard image="../../public/Sirko/sirko-kellekek.jpg" title="Sírkő kellékek" />
        <BaseCard image="../../public/Sirko/sirko-keszites.jpg" title="Sírkő készítés" />
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseCard from '@components/BaseCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseCard
  }
}
</script>

<route lang="json">
{
  "name": "sirko",
  "meta": {
    "title": "Sírkő – Palásti és Társa Kft.",
    "description": "A sírkő a szeretet és tisztelet kifejezése elhunyt hozzátartozónk iránt, egyben jelöli végső nyughelyét; egy utolsó tisztelgés annak emléke előtt, aki már nem lehet velünk. Nekünk, embereknek szükségünk van egy ilyen helyre, ahol emlékezhetünk, egy helyre, ahova visszatérhetünk, egy látható jelre, mely a szeretet, a tisztelet és az elismerés jele, mely az elhunyt életének állít emléket."
  }
}
</route>
