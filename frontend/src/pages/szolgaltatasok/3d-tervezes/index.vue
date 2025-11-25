<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        3D tervezés
      </h2>
    </div>

    <div class="flex flex-col mt-5 md:mt-10 items-center md:mx-12 mb-24 md:mb-52 p-5 md:p-2 pt-0">
      <div class="flex flex-wrap justify-center gap-5 max-w-[1500px]">
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/wj2cVbPeIVI?si=8IpFht4xBWSzLSaq" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/clkRm8QivvE?si=8Nri2vq-V3fhkKfi" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/_3ISJ9a-Cn4?si=zEflXF0Mezz9mUPW" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/aUYK3ePZ6kk?si=QxEtEfa4uQZQmexp" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/GQxADX2jO0A?si=_pl63JvvZvwUuc2c" />
        <BaseVideoLink title="Dupla síremlék 3D látványterv" link="https://www.youtube.com/embed/ZG2b3VP_3SM?si=5Vd-oPCz8Xq2ylA7" />
        <BaseVideoLink title="Szimpla síremlék 3D látványterv" link="https://www.youtube.com/embed/fQiogy-FtyE?si=rdD74wt8Ar5VM-Ir" />
        <BaseVideoLink title="Szimpla síremlék 3D látványterv" link="https://www.youtube.com/embed/u18Id1Rez7M?si=yn6HnEWSvm-IUt9Q" />
        <BaseVideoLink title="Dupla síremlék 3D látványterv" link="https://www.youtube.com/embed/O5tI_OvsOu0?si=GAWA3skowcZVLn2I" />
        <BaseVideoLink title="Dupla síremlék 3D látványterv" link="https://www.youtube.com/embed/8Vd00E9hQDg?si=1IMyqRc39tol3hKi" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/R-hXz1wDhes?si=8b93cfYeXNBBQ-6h" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/6Rnu8CbbuuY?si=Isrcq2pn5GugH4Al" />
        <BaseVideoLink title="Kripta síremlék 3D látványterv" link="https://www.youtube.com/embed/_A3_fXgDzH8?si=ry3-_wlLn9dzEiIe" />
        <BaseVideoLink title="Dupla síremlék 3D látványterv" link="https://www.youtube.com/embed/Sn2bkoa1xl0?si=NLXBHBiKCwaKqKpd" />
      </div>
    </div>

  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseVideoLink from '@components/BaseVideoLink.vue';

export default {
  components: {
    BaseLayout,
    BaseVideoLink
  }
}
</script>

<route lang="json">
{
  "name": "szolgaltatasok-3dtervezes",
  "meta": {
    "title": "3D tervezés – Palásti és Társa Kft.",
    "description": "A szolgáltatások oldalon bemutatjuk a síremlék és egyéb építészeti munkálatokhoz tartozó tevékenységi körünket, amivel professzionálisan eleget tehetünk az egyre inkább gyakori különleges igényeknek. Ehhez rendelkezésre álnak megfelelő hardverek, szoftverek és a nélkülözhetetlen szakmai potencia."
  }
}
</route>
