<template>
  <BaseLayout>
    <BaseSlider class="mt-20 md:mt-[10rem]" />

    <main class="mx-auto px-4 md:px-12 mt-12 md:mt-24 mb-24 md:mb-52 max-w-[1600px]">
      <div class="flex flex-col xl:flex-row gap-12 lg:gap-24">
        
        <aside class="w-full xl:w-[40%] xl:sticky xl:top-32 self-start">
          <header class="mb-8">
            <h1 class="text-3xl md:text-5xl font-black tracking-tighter uppercase italic leading-[0.9]">
              Palásti és Társa <br>
              <span class="text-orange-600">kft.</span>
            </h1>
            <div class="h-1.5 w-24 bg-orange-600 mt-4"></div>
          </header>

          <div class="space-y-6 text-black text-justify leading-relaxed">
            <p>
              A <span class="text-orange-600 font-bold italic">Kő</span> – legyen az gránit, márvány vagy mészkő – az életünk! A <span class="text-orange-600 font-semibold">kőfeldolgozás</span> valamennyi területén megálljuk a helyünket. 1954 óta rengeteg tapasztalatot gyűjtöttünk az egyedi kézműves síremlékek, kripták, emlékművek, szökőkutak és minden egyéb épülethez tartozó kőburkolat, kőtermék készítésében, kerüljön az kültérre vagy beltérre.
            </p>
            
            <div class="bg-white/5 border-l-2 border-orange-600 p-6 backdrop-blur-sm shadow-xl">
              <p class="italic text-gray-400 text-sm md:text-base m-0">
                Számtalan munkát készítettünk köztérre és magánszemélyek otthonába. Készítettünk 390db fürdőszoba -, recepciós - és közösségi illemhelységekbe egyéb gránit pultot a Budapest Hilton szállodának.
              </p>
            </div>

            <p>
              Irodaházaknak homlokzat-, padló- ill. lépcsőburkolatokat. Családi házakba konyhapultot, külső- és belső ablakpárkányt, kerítés fedkövet. 1996 és 2006 között folyamatosan exportáltunk minimal és exluzív formavilágú sírkövet Dániába, Hollandiába, Ausztriába és Németországba.
            </p>

            <p class="pt-4">
              A hazai piacra szánt sírkő termékeink a szolíd árfekvésűtől az egyedi, prémium kategóriáig bezárólag, széles választékban állnak megrendelőink rendelkezésre. Ezáltal mindenki megtalálhatja az elképzelése és lehetőségéhez leginkább illő megoldásokat. Magától értetődő, hogy a hibátlan kőtermék csak a megfelelő minőségű alapanyagból készülhet.
            </p>
          </div>
        </aside>

        <section class="w-full xl:w-[60%] space-y-8 md:space-y-16">
          <BaseInfoCard 
            v-for="(card, index) in infoCards" 
            :key="index"
            v-bind="card"
            class="modern-card"
          />
          
          <div class="p-8 bg-orange-600/10 border border-orange-600/20 rounded-sm">
             <p class="text-black text-justify m-0">
              Sok évtizedes kapcsolatok fűznek bennünket hazai, európai és a világ számos országában működő kőbányákhoz. Igény szerint, a világon bányászott természetes kövek közül bármelyik beszerezhető és elképzelés szerint feldolgozzuk félkész ill. készterméknek.
            </p>
          </div>
        </section>

      </div>
    </main>
  </BaseLayout>
</template>

<script setup>
import { reactive } from 'vue'
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseSlider from '@components/BaseSlider.vue'
import BaseInfoCard from '@components/BaseInfoCard.vue'

const infoCards = reactive([
  { 
    image: "/Home/sirko.jpg", 
    text: "A hazai piacra szánt kézműves <span class='text-orange-600 font-semibold text-lg'>sírkő</span> termékeink a szolíd árfekvésűtől az egyedi, prémium kategóriáig bezárólag, széles választékban állnak megrendelőink rendelkezésre. Ezáltal mindenki megtalálhatja az elképzelése és lehetőségéhez leginkább illő megoldásokat. Magától értetődő, hogy a hibátlan kőtermék csak a megfelelő minőségű alapanyagból készülhet. Sok évtizedes kapcsolatok fűznek bennünket hazai, európai és a világ számos országában működő kőbányákhoz. Igény szerint, a világon bányászott természetes kövek közül bármelyik beszerezhető és elképzelés szerint feldolgozzuk félkész ill. készterméknek." 
  },
  { 
    image: "/Home/epiteszet.jpg", 
    text: "Az <span class='text-orange-600 font-semibold text-lg'>építészet</span> oldalon felsorolt témakörök magukba foglalják tevékenységünk jelentős részét. Mint konyhapult, fürdőszobapult, lépcsőburkolat, ablakpárkány, kerítés fedkő, kőkorlát azaz baluszter korlát, kandalló, padlóburkolat, kültéri burkolatok azaz terasz-, fal-, lábazat- és homlokzatburkolat, kőbútor, emlékmű, emléktábla, szökőkút és speciális kőtermékek, mint tömb mosdókagyló, tömb zuhanytálca vagy precíziós, specifikus gépek és műszerek gépasztala. Ezek jelentős részét meglévő tervek alapján készítettük el, de az is előfordult többször, hogy csak a koncepció született meg és a szakmai tapasztalatunkra támaszkodva indult a tervezés." 
  },
  { 
    image: "/Home/szolgaltatasok.jpg", 
    text: "A <span class='text-orange-600 font-semibold text-lg'>szolgáltatások</span> oldalon bemutatjuk további tevékenységi körünket, amivel maximálisan eleget tehetünk az egyre gyakoribb különleges igényeknek. 3D tervezés, ami a sírkő készítők világában egyáltalán nem jellemző. Lézergravírozás gránitba, teljesen más technológiát igényel, mint más anyagba. Gépi, műszaki és szakmai felkészültségünknek köszönhetően hozott anyagból, bérmunkával is foglalkozunk, mint kőtömb darabolása, tábla méretre vágása, szélezése, natúr felületek fényezése, rovátkolása, flammolása azaz égetése." 
  },
  { 
    image: "/Home/ko-anyagmintak.jpg", 
    text: "A <span class='text-orange-600 font-semibold text-lg'>természetes kőzetek</span> földünk szilárd anyagának kémiailag különböző, többfelé megtalálható, nagy kiterjedésű ásványtömegei, vagy jellemző összetételű ásványtársulásai. Ezek mindig konkrét természeti folyamatban, egységesen képződnek. Az ásványokon kívül gyakran nem ásványos (amorf) anyagokat is tartalmaznak; ezek mennyisége egyes (főleg vulkáni) kőzetekben a kőzet tömegének akár 90%-ánál is több lehet. A kő anyagminták oldalon megtalálhatják aktuális kínálatunkat és ezen felül, megismerhetnek számos különleges kőanyaggal." 
  },
  { 
    image: "/Home/egyeb-informaciok.jpg", 
    text: "Egy laikus számára rengeteg megválaszolandó <span class='text-orange-600 font-semibold text-lg'>kérdés</span> merülhet fel. Természetesen nem kell mindenhez értenünk és elég lehet, ha a hozzáértő szakértelemben megbízunk. Pl: Miért gránit? Hogyan válasszunk sírkövet? Milyen az ország, megye, város vagy a falu szerinti (helyi) temetkezési kultúra és szokások? Milyen különleges szolgáltatásokat tudunk nyújtani? Miben tudunk segíteni? Mennyibe kerül a síremlék? Megrendelés menete? Az alábbi oldalon megpróbálunk minél szerteágazóan, informatívan és érthetően néhány kérdésre megadni a válaszokat. Kérem, hogy forduljon hozzánk bizalommal kérdéseivel." 
  }
])
</script>

<style scoped>
/* Modern kártya animáció */
.modern-card {
  @apply transition-all duration-700 ease-out border-b border-white/5 pb-8 md:pb-16;
}

.modern-card:hover {
  @apply border-orange-600/30;
}

/* Sorkizárás finomhangolás */
p {
  hyphens: auto;
  text-justify: inter-word;
}

/* XL méret alatt kikapcsoljuk a sticky-t a bugok ellen */
@media (max-width: 1279px) {
  aside {
    position: relative !important;
    top: 0 !important;
  }
}

/* Ha a képernyő túl alacsony, ne legyen sticky, mert levágná a szöveg alját */
@media (min-height: 950px) and (min-width: 1280px) {
  .xl\:sticky {
    position: sticky;
  }
}
</style>