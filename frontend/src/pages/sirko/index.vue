<template>
  <BaseLayout>
    <div class="mt-32 text-center text-white">
      <h1 class="text-3xl font-bold mb-5">Sírkő</h1>
      <p>
        Ez a Sírkő aloldal. Ide jön majd a konkrét tartalom (képek, termékek stb.).
      </p>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'

export default {
  components: { BaseLayout }
}
</script>

<route lang="json">
{
  "name": "sirko",
  "meta": {
    "title": "Sírkő – Palásti és Társa Kft.",
    "description": "Palásti és Társa Kft. hivatalos weboldala – kézműves sírkövek, gránit, márvány, mészkő termékek"
  }
}
</route>
