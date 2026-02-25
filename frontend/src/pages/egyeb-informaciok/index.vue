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
  „A halott földi maradványai eltakarításának a módja. A temetkezés különféle módjai annak a felfogásnak az alapján alakultak különfélékké, amely az illető népnél az elhunytak túlvilági állapotáról uralkodik. A temetkezésnek kétségkívül egyik legrégibb s minden időben a legelterjedtebb módja az elföldelés, amely azonban nagyon különböző lehet. Ahol, mint pl. legjellemzőbben a régi egyiptomiaknál, a halál utáni létről oly felfogás uralkodik, amely szerint a testtől különvált lélek fennmaradása a halott földi részének fennmaradásától függ: ott a fő gond a tetemek épen tartására irányult. Innen a bebalzsamozás, mumifikálás és sziklasírokba, gúlákba temetés (l. Balzsamozás). Ellenben ott, ahol a halott iránti kegyelet törvényével a romlandó részek elpusztulása nem áll összeütközésben, a T. oly módjaival is beérik, amelyek bizonyos hagyományos szertartások szemmel tartása mellett oda irányulnak, hogy a holttest lehetőleg ártalmatlan legyen az élőkre nézve. Eredetileg a temetés ily módjainál is az volt a fődolog, hogy az elholtnak lelke is meglelje e mellett nyugalmát. Alapjában véve ugyanis a T. minden módjának az erről való gondoskodás az irányító szempontja. (L. Holtak tisztelete. ) Másik, szintén igen elterjedt s néhol az elföldeléssel együtt is járatos módja a temetésnek a halotthamvasztás, melynek régibb alakja a holttestnek máglyán való elégetése, mint az pl. a régi görögöknél és rómaiaknál történt. A hamvak helyének bizonyos emlékkel való megjelölése, maguknak a hamvaknak megőrzése szintén a T. valláserkölcsi alapon fejlődött szertartásai keretébe tartozik. Ugyanide valók a T. -t megelőző gyakorlatok is, melyek közül pl. a legsajátszerűbbek egyike az egyiptomi halottbíróság (l. o. ). A holttest elföldelésén és elhamvasztásán kívül annak egészben vagy részben való megsemmisítése néhol úgy is történik, hogy a holttestet a levegőn szántják ki de megvédik a ragadozók támadásaitól; másutt ellenben szándékosan éppen ezeknek teszik ki prédául. Legfejlettebb intézmény alakjában a T. e módját az indiai parsziknál láthatni, kiknek u. n. hallgatástornyai nagyszabású kőralakú építmények, amelyek arra valók, hogy az íly temető helyek környékén szüntelen kóválygó keselyűk és egyéb ragadozó madarak az ott elhelyezett hullákat egészen a csontokig elpusztítsák. Még primitívebb az az eljárás, hogy a halottat a hozzátartozói, vagy a győztes ellenfelei maguk falják fel, legalább részben. Régibb és újabb népeknél elég elterjedt módja a T. -nek a víz alá merítés, vagy vízre bocsátás is, amelynek kivált hajós és tengerésznépeknél láthatni többé-kevésbé jellemző példáit. (Ilyen a vikingtemetés, a vikingek a halottat a felgyújtott hajón bocsátották tengerre. ) A halottnak másvilági útjára való felszerelése, a túlvilági jóllétéről való gondoskodás is nagyban függ ama képzetektől, melyek a halál utáni létről valamely népnél uralkodnak. E gondoskodás néha nagyobb arányokat ölt, kivált harcias népeknél a hősök, törzsfőnökök, fejedelmén temetése alkalmával, amikor harci mének, sőt hadi foglyok kisebb-nagyobb számának (néha egész hekatombáknak) feláldozása volt és van némely primitív népeknél még ma is szokásban. E halotti vagy temetési áldozatok maradványai még később, sőt a jelenkorban is, és még műveltebb népeknél is szerényebb mértékre szorultan az u. n. halotti torok, amelyek az elköltözött lelkének engesztelésére való áldozati lakomák, áldomások csökevényei. A régi magyar T. -ről az Ipolyi Magyar myth. 548. s köv. oldalain olvasható adatokon kívül v. ö. különösen Munkácsi B., A régi magyar lovas temetkezés keleti változatai (Ethnographia VII., 1896, 297-323). V. ö. W. Caland, Über Totenverehrung bei einigen der Indogermanischen Völker (1888) és Die Altindischen Todten-und Bestattungsgebräuche (1896); I. Lippert: Christenthum, Volksglaube und Volksbrauch (1882); Th. Preuss, Die Begräbnissarten der Amerikaner und Nordostasiaten (1894); E. Samter, Geburt., Hochzeit und Tod (1911).
  <br><br>
  Forrás: Révai lexikon”
`

const whyGranite = `
  <p class='mb-4'><span class='text-orange-600 font-semibold'>Amit tudni kell róla:</span></p>
  <ul class='list-disc pl-5 space-y-2'>
    <li>Vulkáni eredetű természetes kőzet. Természeténél fogva rendkívül kemény, ezért a megmunkálása után felülete örök életű (lásd: egyiptomi obeliszkek). Fizikai tulajdonságait megőrzi, nem vetemedik, nem reped, nem korrodálódik és mérsékelt nedvszívó hatású. Savnak és lúgnak ellenáll. Fent említett okok miatt minden gránitból készült termék örök életű.</li>
    <li>Ezzel szemben a mészkő és márvány (üledékes kőzet) erősen nedvszívó (a fagy hatására felülete erősen korrodálódik), a külső szennyeződést könnyen magába szívja, savnak, lúgnak, nem áll ellen, ezért a fényét könnyen elveszíti szabadtéren. Felhasználásuk első sorban belső térben ajánlott.</li>
    <li>A szobrok, baluster korlátok és kőburkolatok matt ill. faragott kivitelezése miatt alkalmazható szabadtéren.</li>
  </ul>
  <br>
  <p><span class='text-orange-600 font-semibold'>Gránit, mint kőzet:</span></p>
  <p class='mt-2 italic text-sm text-gray-300'>„Szemcsés szövetű összetett tömeges kőzet. Lényeges elegyrészei földpát (ortoklász, mikroklin, kevés oligoklász) kvarc és csillám (muszkovit, biotit, litumcsillám). A csillám legelőször vált ki a megmerevedő magmában, azért kristálylapokkal van határolva, hatszöges táblákat, pikkelyeket alkot. Legutoljára vált ki a kvarc, amely füstszürke szabálytalan szemek alakjában a többi elegyrészek közti tért tölti ki. Van aprószemű, közép- és öregszemű G. Az ú. n. pegmatitos-telérekben a földpát és csillám méternyi nagyságot is elérnek. Némely G. -ban a földpátok a többi elegyrészekkel szemben tekintélyes nagyságot érnek el az ilyen G. - ot G. - porfirnak nevezzük. Ha a csillámok egymással párhuzamosan helyezkednek el, akkor gnájsz G. -ról beszélünk, A csillám muszkovit vagy biotit, vagy mindkét féle csillám is van a kőzetben. A csillámot pótolhatja részben vagy teljesen amfibol v. piroxén. Ezen alapon megkülönböztetünk: 1. igazi (2 csillámú) G. -ot; 2. Granititet (csak biotit); 3. amfibol-G. -ot; 4. piroxén-G. -ot; továbbá az alkáliákban gazdag gránitot, 5. riebeckit-G. -ot; 6. arfvedsonit-G. -ot; 7. egirin-G; ot. Járulékos ásványos elegyrészek: turmalin, cirkon, apatit, vasércek, topáz, grafit, kasziterit stb. A földpát átalakulása vagy elmállása révén porcellánföld (kaolin) keletkezik; ezt a G. -nak darává való széthullása előzi meg. A G. -terület vagy dombos vidékek vagy nagyfensíkok (rendesen lápokkal) vagy meredek szirtek (Tátra) tájképét nyújtja. A Kárpátok övének magja G. -ból áll (Kis Kárpátok, Lajta-hegység, Fátra, Zoborhegy, a Tátrák, Fogarasi havasok). A gömbös G. -ban az elegyrészek szferoidálisan vannak elhelyezve (pudding-G. ); lelőhelye: Meissen (Szászorsz. ) Anglia, Finnország. Az írás-G. csak nagy földpát és kvarcszemekből áll, amelyek egymással szabályszerűen vannak összenőve. Az aprószemű G. -ot, amely csak kvarc- és. földpátból áll és többnyire csakis teléreket alkot a közönséges G. -ban, aplitnek hívják. A greizen az a G., amelyben az ónércek találhatók, a földpátot kiszoríta a kvarc, a csillám rendesen litiumtartalmú; többnyire fluor- és bórtartalmú járulékos elegyrészek (topáz, fluorit, turmalin) vannak benne (Szászországban Zinnwald; Cornwall: luxullian néven turmalin és kasziterittel). A rapakivi turmalin és fluorittartalmú amfiból-G.; a földpát könnyen kiesik belőle, onnan a finn rapakivi (rothadt kő) elnevezés; Finnországból diluviális vándorkövek alakjában az észak-német síkságra került nagy mennyiségben. A G. - ot a technikában nagyon felhasználják. Szobortalapzatoknak, oszlopoknak, lépcsőknek igen alkalmas. Az ókorban az egyiptomiak és rómaiak, az újkorban az oroszok (Szibériából és Finnországból) és svédek alkalmazzák elsősorban. Az ónérceken kívül a G. tartalmaz még néhol antimonérceket (Magurka az Alacsony-Tátrában), aranyat (Berezovszk).”</p>
  <span class='text-orange-600 font-semibold italic'>Forrás: Révai lexikon</span>
`

const howToChoose = `
  <div class='space-y-4'>
    <p>1. Melyik temetőben helyezték örök nyugalomra az elhunytat. (A BTIRT által üzemeltetett temetőkben (Bp.) csak a sírhely felett rendelkező személy állíttathat sírkövet.) </p>
    <p>2. Milyen méretű lesz a sírkő? (urna, szimpla, másfeles, dupla, kripta - a méretek ezeken belül is változhatnak településenként is.) </p>
    <p>3. Alapozás fix vagy mobil? Koporsós temetés alkalmával kell-e bontani az alapokat is, vagy nem? Fix - helyszíni betonozás, mobil - előre gyártott elemek, később bontható. </p>
    <p>4. Mi lesz a sírkő alapanyaga? (márvány, gránit, mészkő) </p>
    <p>5. Milyen elképzelés alakult ki a formákról? – Milyen legyen az alsó és felső rész? Dönteni kell a kiegészítőkkel kapcsolatban is (felirat minősége, darabszáma, ornamentika, szimbólumok, vágott virág váza, mécses, egyedi kívánság, díszítés) </p>
    <p>6. Milyen határidőre készüljön el? (A gyártási határidő függ attól, hogy megfelelő mennyiségben és minőségben van-e raktáron a választott anyag. Gyártási kapacitásunk mennyire van terhelve.) </p>
  </div>
  <p class='mt-6 italic border-l-2 border-orange-600 pl-4'>
    Miután a fenti kérdések választ adtak, kérjük nézzék át a weboldalunkon található sírkőkínálatunkat és látogassanak el hozzánk. Kollégáink szívesen állnak tanácsaikkal is rendelkezésükre. Az egész ország területére szállítunk ki és helyezünk el síremléket, ezért ha Ön távolabbi településről érkezik, kérjük előzetesen egyeztessen időpontot a megadott elérhetőségek valamelyikén. 
  </p>
  <p class='mt-6 italic border-l-2 border-orange-600 pl-4'>
    A weboldal nem tükrözi a teljes formai kínálatunkat. Sírkőkészítő cég lévén, a forma- és stílusvilágnak csak a fantázia szab határt. Ha katalógusaikban nincs az Ön számára megfelelő forma, saját elképzelés is szívesen megvalósítjuk fotó, rajz alapján, ha a síremlék elkészíthető, ha fizikailag, statikailag megbízható. Különleges méretű síremlék (pl: kripta) esetén ingyenes felmérést végzünk 
  </p>
`

const pricingInfo = `
  <p class='mb-4'>A sírkő ára az alábbi tételekből áll össze:</p>
  <ol class='list-decimal pl-5 space-y-6'>
    <li>
      <span class='text-orange-600 font-semibold'>Melyik anyagból készül?</span>
      <p class='mt-1 '>A nyersanyagok közti árkülönbség számottevő lehet. Az olcsó és drága gránit között nem minőségi differencia az árkülönbség.</p>
      <p class='mt-1  font-medium italic'>Egyszerűen, a bánya határozza meg a nyersanyag árát, ami függ:</p>
      <ul class='list-disc pl-5 mt-1'>
        <li>a bányászati körülményektől (külszíni kitermelés egyszerű, a mélységből történő kitermelés nehezebb),</li>
        <li>a nyersanyag minőségi előfordulásától %-ban,</li>
        <li>a szállítási költségtől (a világ mely pontján bányásszák).</li>
      </ul>
    </li>
    <li>
      <span class='text-orange-600 font-semibold'>Anyagszükséglet:</span>
      <p class='mt-1 '>A sírkő szerkezetétől, formájától és méretétől függ, hogy mennyi nyersanyagot használunk fel az elkészítéséhez.</p>
    </li>
    <li>
      <span class='text-orange-600 font-semibold'>Forma és design:</span>
      <p class='mt-1 '>A ráfordított munkaidő is befolyásolja az árat egy egyszerűbb és egy bonyolultabb forma között.</p>
    </li>
    <li>
      <span class='text-orange-600 font-semibold'>Kiegészítők:</span>
      <p class='mt-1 '>Felirat, váza, mécsestartó, ornamentika mennyisége és minősége.</p>
    </li>
  </ol>
`;

const orderingProcess = `
  <p>Miután sikerült kiválasztani az Önök számára legmegfelelőbb síremléket, a következő lépéseket fogjuk megtenni.</p>
  <p>Megegyezést szerződéskötés követi, melyben írásban rögzítjük azt, amiben korábban, szóban megállapodtunk! Az előleg mértéke cégünknél nincs kikötve, az megegyezés tárgyát képezi. Garancia szintén a szerződés része: a sírkő anyagára 5, a süllyedésre 2 -5 év. Végezetül a szerződés teljesítéseként a síremléket a megrendelő által kijelölt helyre szállítjuk és ott a megbeszélt időben és módon végleges helyére állítjuk.</p>
`

const specialServices = `
  <div class='space-y-6'>
    <div>
      <h3 class='text-lg font-semibold text-orange-600 mb-3'>Síremlék készítés</h3>
      <ul class='grid grid-cols-1 gap-3'>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          Egyéni elképzelés alapján <span class='font-medium'>3D-s látványtervet</span> készítünk megrendelés esetén.
        </li>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          <span class='font-medium'>Otthonából is megrendelheti:</span> személyesen felkeressük, vagy intézheti e-mailben és telefonon.
        </li>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          A felállításhoz szükséges <span class='font-medium'>adminisztrációs feladatokat</span> teljes körűen elvégezzük.
        </li>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          A sírkő elszállítása és helyezése az <span class='font-medium'>ország egész területére</span> vonatkozik.
        </li>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          Minden síremlék köré <span class='font-medium'>ajándék murvázást</span> biztosítunk.
        </li>
      </ul>
    </div>

    <div>
      <h3 class='text-lg font-semibold text-orange-600 mb-3'>Épületmunka</h3>
      <ul class='grid grid-cols-1 gap-3'>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          Egyéni elképzelés alapján, szükség szerint <span class='font-medium'>3D-s látványtervet</span> készítünk.
        </li>
        <li class='bg-white/5 p-3 rounded-sm border-l-2 border-orange-600'>
          A munka felmérése, elszállítása és helyezése az <span class='font-medium'>ország egész területére</span> kiterjed.
        </li>
      </ul>
    </div>
  </div>
`;

const faq = `
  <div class='divide-y divide-white/10'>
    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>Mikor lehet sírkövet felállítani temetés után?</p>
      <p class='text-gray-300'>Akár három hónap elteltével.</p>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>Miért gránit?</p>
      <p class='text-gray-300'>Mert száz év múlva is fénye marad, nem fagy szét és nem korrodálódik.</p>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>Milyen karbantartást igényel a gránit síremlék?</p>
      <p class='text-gray-300'>Csak tiszta vízzel kell lemosni.</p>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>Milyen a fuga?</p>
      <ul class='list-disc pl-5 text-gray-300'>
        <li><span class='font-medium text-white'>Színtelen:</span> átveszi a kő színét.</li>
        <li><span class='font-medium text-white'>Rugalmas:</span> a nagy hőingadozás miatti tágulást és összehúzódást (diletáció) is bírja.</li>
      </ul>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>A sírkövet télen védeni kell?</p>
      <p class='text-gray-300'>A gránit síremléket nem szükséges, mert ellenáll a fagynak.</p>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>A vázákban van kivehető betét és miért kell télen becsomagolni?</p>
      <p class='text-gray-300'>Igen, van betét. A csomagolás azért fontos, mert a benne felejtett víz fagy hatására megduzzad és szétrepesztheti a vázát.</p>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>Mennyi időt bír az arany és a relief betű?</p>
      <p class='text-gray-300'>Az <span class='text-white'>arany betű</span> gránitban kb. 15-20 évet bír, míg a <span class='text-white'>relief (vésett) betű</span> örök életű.</p>
    </div>

    <div class='py-4'>
      <p class='text-orange-600 font-semibold'>Mitől süllyedhet meg a síremlék, ha bontható a szerkezete?</p>
      <p class='text-gray-300 italic text-sm'>
        A sírkő alapjai (betonáthidaló gerenda) a szűz földre vannak elhelyezve, amire az áthidaló járdaszegély kerül, így a felépítmény nem a mozgatott földre épül. Sajnálatos módon, ha a szűz föld megmozdul (akár évtizedekkel később is), a síremlék megbillenhet.
      </p>
    </div>
  </div>
`;
</script>

<route lang="json">
{
  "name": "egyeb-informaciok",
  "meta": {
    "title": "Egyéb információk – Palásti és Társa Kft.",
    "description": "Miért gránit? Amit tudni kell róla: - Vulkáni eredetű természetes kőzet. Természeténél fogva rendkívül kemény, ezért a megmunkálása után felülete örök életű (lásd: egyiptomi obeliszkek). Fizikai tulajdonságait megőrzi, nem vetemedik, nem reped, nem korrodálódik és mérsékelt nedvszívó hatású. Savnak és lúgnak ellenáll. Fent említett okok miatt minden gránitból készült termék örök életű..."
  }
}
</route>