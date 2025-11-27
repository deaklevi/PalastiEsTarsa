<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">
        Bérmunka
      </h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Munka</th>
                <th>Anyag</th>
                <th>Méret</th>
                <th>Árak</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'

export default {
  components: {
    BaseLayout
  }
}
</script>

<route lang="json">
{
  "name": "szolgaltatasok-bermunka",
  "meta": {
    "title": "Bérmunka – Palásti és Társa Kft.",
    "description": "A szolgáltatások oldalon bemutatjuk a síremlék és egyéb építészeti munkálatokhoz tartozó tevékenységi körünket, amivel professzionálisan eleget tehetünk az egyre inkább gyakori különleges igényeknek. Ehhez rendelkezésre álnak megfelelő hardverek, szoftverek és a nélkülözhetetlen szakmai potencia."
  }
}
</route>
