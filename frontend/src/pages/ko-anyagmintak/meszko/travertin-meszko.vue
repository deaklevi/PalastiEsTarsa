<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Travertin mészkő</h2>
      <BaseInfoCard class="mt-5 md:mt-10 max-w-[1500px]" image="../../public/Ko-anyagminta/Meszko/travertin.jpg" text="A <span class='text-orange-600 font-semibold'>travertin mészkő</span>, másik nevén mésztufa a mészkő egyik formája. Egyéb megnevezései az édesvízi mészkő, tavi mészkő, forrásmészkő, mésztufa, mészszivag, traventino, illetve mészszinter. A travertin mészkő jellegzetesen lukacsos, színe világos, de a képződése folyamán kapott szennyeződésektől krémszínű, vagy akár barnább színt is kaphat. Képződése az édesvízből kicsapódott kalciun-karbotát ülepedésével kezdődik édesvízi tavakban,hévízforrásnál vagy mészkőbarlangban. Alkotóelemei kalcit és az aragonit. A források mentén kicsapódott mészkőre algák és mohák telepednek, melyekre folyamatosan csapódik ki a következő mészkő réteg a növények kémiai kölcsönhatásának és az általuk keltett „örvényeknek” köszönhetően. A folyamat így ismétlődik újra és újra, ami nagyban hozzájárul a mésztufa lukacsos jellegéhez. A travertin mészkő kiváló kőzettani tulajdonságai és természetes esztétikája miatt egyre nagyobb a felhasználási terület, ahol alkalmazzák kültéren és beltérben egyaránt. Padló-, fal- és homlokzat burkolat, szökőkút, szobor talpazat vagy akár emlékmű is. Kérem, tekintse meg travertin-, és külön rendszerezve a római travertin mészkő kínálatunkat, és segítünk a célnak, esztétikának és a pénztárcának legmegfelelőbbet kiválasztani." />
    </div>

    <!-- Itt már csak a komponens -->
    <h2 class="mt-12 md:mt-[4rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Travertin mészkő</h2>
    <BaseStoneCard group="travertin-meszko"/>

    <h2 class="mt-12 md:mt-[4rem] md:mx-12 text-xl font-bold w-full text-center md:text-left">Római travertin mészkő</h2>
    <BaseStoneCard group="romai-travertin-meszko"/>

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
  "name": "ko-anyagminta-travertin-meszko",
  "meta": {
    "title": "Travertin mészkő – Palásti és Társa Kft.",
    "description": "A travertin, másik nevén mésztufa a mészkő egyik formája. Egyéb megnevezései az édesvízi mészkő, tavi mészkő, forrásmészkő, mésztufa, mészszivag, traventino, illetve mészszinter. A travertin mészkő jellegzetesen lukacsos, színe világos, de a képződése folyamán kapott szennyeződésektől krémszínű, vagy akár barnább színt is kaphat. Képződése az édesvízből kicsapódott kalciun-karbotát ülepedésével kezdődik édesvízi tavakban,hévízforrásnál vagy mészkőbarlangban."
  }
}
</route>