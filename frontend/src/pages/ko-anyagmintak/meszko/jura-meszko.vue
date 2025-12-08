<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Jura mészkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Meszko/jura.jpg" text="A <span class='text-orange-600 font-semibold'>jura mészkő</span> üledékes kőzet, melynek jellegzetessége a sűrűn előforduló fosszíliák , elszórt kvarcszemcsék és kvarcerek. A bányák dél-Németországban, azaz Bajorországban találhatóak. A fosszíliák, más néven ősmaradványok, ősleletek, az állatok, növények vagy más élő szervezetek megkövesedett vagy egyéb módon megőrződött maradványai, illetve lenyomatai. A kvarcereket sok esetben repedésnek, összeragasztott kőnek véli a nem hozzáértő laikus. Ezek több mint 100 millió évvel ezelőtti földrengéstől vagy hegycsuszamláskor keletkeztek. A két elmozdult réteg közé a nagy hő és nyomás hatására általában megolvadt kvarckristályok, néha fémkristályok (akár 'aranyér' is előfordulhat) folyt be, és töltötte ki az üregeket. Ezen a helyen a kőlap stabilitása talán még erősebb is, de biztos, hogy a kő ettől, és ott nem fog eltörni. Ez nem hibája a jura mészkőnek, hanem annak szerves része. A Jura mészkő kiváló kőzettani tulajdonságai miatt egyre nagyobb a felhasználási terület, ahol alkalmazzák kültéren és beltérben egyaránt. Padló-, fal- és homlokzat burkolat, szökőkút, szobor talpazat vagy akár emlékmű is. A legkeményebb mészkövek közé tartozik. Kérem, tekintse meg Jura mészkő kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <BaseStoneCard group="jura-meszko" class="mt-12 md:mt-[10.5rem]"/>

  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'
import BaseStoneCard from '@components/BaseStoneCard.vue'

export default {
  components: {
    BaseLayout,
    BaseInfoCard,
    BaseStoneCard
  }
}
</script>

<route lang="json">
{
  "name": "ko-anyagminta-jura-meszko",
  "meta": {
    "title": "Jura mészkő – Palásti és Társa Kft.",
    "description": "A Jura mészkő üledékes kőzet, melynek jellegzetessége a sűrűn előforduló fosszíliák , elszórt kvarcszemcsék és kvarcerek. A bányák dél-Németországban, azaz Bajorországban találhatóak. A fosszíliák, más néven ősmaradványok, ősleletek, az állatok, növények vagy más élő szervezetek megkövesedett vagy egyéb módon megőrződött maradványai, illetve lenyomatai."
  }
}
</route>