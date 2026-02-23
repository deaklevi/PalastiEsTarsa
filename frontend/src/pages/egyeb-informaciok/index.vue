<template>
  <BaseLayout>
    <header class="flex flex-col items-center md:mx-12">
      <h1 class="mt-5 md:mt-10 text-2xl font-bold w-full text-center md:text-left border-b-2 border-orange-600 pb-2">
        Egyéb információk
      </h1>
    </header>

    <section class="space-y-6 md:space-y-12">
      
      <BaseMoreInfoCard 
        class="mt-5 md:mt-10" 
        title="Temetkezési kultúra" 
        :text="funeralCulture"
      />

      <BaseMoreInfoCard 
        title="Miért gránit?" 
        :text="whyGranite"
      />

      <BaseMoreInfoCard 
        title="Hogy válasszunk sírkövet?" 
        :text="howToChoose"
      />

      <BaseMoreInfoCard 
        title="Mennyibe kerül a síremlék?" 
        :text="pricingInfo"
      />

      <BaseMoreInfoCard 
        title="Megrendelés menete" 
        :text="orderingProcess"
      />

      <BaseMoreInfoCard 
        title="Különleges szolgáltatások" 
        :text="specialServices"
      />

      <BaseMoreInfoCard 
        class="mb-24 md:mb-52" 
        title="Gyakran felmerülő kérdések" 
        :text="faq"
      />

    </section>
  </BaseLayout>
</template>

<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseMoreInfoCard from '@components/BaseMoreInfoCard.vue'

/**
 * A hosszú szövegeket változókba szerveztük, hogy a template 
 * tiszta és olvasható maradjon.
 */

const funeralCulture = `
  „A halott földi maradványai eltakarításának a módja... (stb)”
  <br><br>
  <span class='text-orange-600 font-semibold italic'>Forrás: Révai lexikon</span>
`

const whyGranite = `
  <p class='mb-4'><span class='text-orange-600 font-semibold'>Amit tudni kell róla:</span></p>
  <ul class='list-disc pl-5 space-y-2'>
    <li>Vulkáni eredetű természetes kőzet. Rendkívül kemény, örök életű felület...</li>
    <li>Ezzel szemben a mészkő és márvány üledékes kőzet, erősen nedvszívó...</li>
  </ul>
  <br>
  <p><span class='text-orange-600 font-semibold'>Gránit, mint kőzet:</span></p>
  <p class='mt-2 italic text-sm text-gray-300'>„Szemcsés szövetű összetett tömeges kőzet. Lényeges elegyrészei földpát, kvarc és csillám...”</p>
  <br>
  <span class='text-orange-600 font-semibold italic'>Forrás: Révai lexikon</span>
`

const howToChoose = `
  <div class='space-y-4'>
    <p><strong>1. Melyik temetőben?</strong> (Bp-en csak a sírhely felett rendelkező személy állíttathat...)</p>
    <p><strong>2. Milyen méretű?</strong> (Urna, szimpla, másfeles, dupla, kripta...)</p>
    <p><strong>3. Alapozás:</strong> Fix (helyszíni betonozás) vagy mobil (előre gyártott)...</p>
    <p><strong>4. Alapanyag:</strong> Gránit, márvány vagy mészkő.</p>
    <p><strong>5. Formák és kiegészítők:</strong> Alsó- és felsőrész, vázák, mécsesek, feliratok.</p>
  </div>
  <p class='mt-6 italic border-l-2 border-orange-600 pl-4'>
    Cégünk az ország egész területére szállít. Különleges kérések esetén ingyenes felmérést végzünk.
  </p>
`

const pricingInfo = `
  <p class='mb-2'>A sírkő ára több összetevőből áll:</p>
  <ol class='list-decimal pl-5 space-y-4'>
    <li><span class='text-orange-600 font-semibold'>Anyag:</span> A bánya határozza meg (kitermelés, ritkaság, szállítás).</li>
    <li><span class='text-orange-600 font-semibold'>Anyagszükséglet:</span> A szerkezet és méret függvénye.</li>
    <li><span class='text-orange-600 font-semibold'>Forma és design:</span> A ráfordított munkaidő.</li>
    <li><span class='text-orange-600 font-semibold'>Kiegészítők:</span> Feliratok, vázák, ornamentika.</li>
  </ol>
`

const orderingProcess = `
  <p>Megegyezést <strong>írásos szerződéskötés</strong> követ. Az előleg mértéke megegyezés tárgya.</p>
  <p class='mt-2 underline decoration-orange-600'>Garancia: Anyagra 5 év, süllyedésre 2-5 év.</p>
`

const specialServices = `
  <ul class='grid grid-cols-1 md:grid-cols-2 gap-4'>
    <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>3D-s látványterv készítése</li>
    <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>Helyszíni felmérés országosan</li>
    <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>Teljes körű ügyintézés</li>
    <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>Murvázás minden síremlék köré</li>
  </ul>
`

const faq = `
  <div class='divide-y divide-white/10'>
    <div class='py-3'>
      <p class='text-orange-600 font-semibold'>Mikor lehet sírkövet felállítani temetés után?</p>
      <p>Akár három hónap elteltével.</p>
    </div>
    <div class='py-3'>
      <p class='text-orange-600 font-semibold'>A vázákban van kivehető betét?</p>
      <p>Igen, de télen fontos becsomagolni őket a fagy miatt!</p>
    </div>
    <div class='py-3'>
      <p class='text-orange-600 font-semibold'>Mennyit bír az arany betű?</p>
      <p>Gránitban kb. 15-20 évet, míg a relief (vésett) betű örök életű.</p>
    </div>
  </div>
`
</script>