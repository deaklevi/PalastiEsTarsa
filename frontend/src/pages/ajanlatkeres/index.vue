<template>
  <BaseLayout>
    <!-- Ajánlatkérés fejléc -->
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Ajánlatkérés</h2>
    </div>

    <div class="mx-auto mt-5 md:mt-10 w-[90%] lg:max-w-4xl">
      <p class="text-base text-left"> Az alábbbi űrlap alapvetően síremlék árajánlat kérésére vontakozik. <span class="text-orange-600 font-semibold underline">Így minden mező kitöltése kötelező.</span> Abban az esetben, ha más, egyéb termék iránt érdeklődik, a kapcsolat oldalon lévő üzenetdobozban elküldheti ajánlatkérését vagy közvetlenül megkereshet minket e-mail-en vagy telefonon. </p>
    </div>

    <!-- Ajánlatkérés form -->
    <div class="bg-slate-950 md:w-full max-w-2xl p-10 mx-auto rounded-md mt-5 md:mt-10 mb-24 md:mb-52 w-[90%]">
      <form @submit.prevent="handleSubmit">
        <div class="flex flex-col lg:flex-row lg:justify-center gap-4">
          <!-- Step 1 -->
          <div class="flex flex-col gap-4 w-full">
            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Név:</label>
              <input v-model="form.name" type="text" placeholder="Név" class="w-full rounded-sm border-2 border-orange-600 p-2" required />
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">E-mail cím:</label>
              <input v-model="form.email" type="email" placeholder="Email" class="w-full rounded-sm border-2 border-orange-600 p-2" required />
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Telefonszám:</label>
              <input v-model="form.phone" type="text" placeholder="Telefonszám" class="w-full rounded-sm border-2 border-orange-600 p-2" />
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Temető (város):</label>
              <input v-model="form.cemetery" type="text" placeholder="Temető (város)" class="w-full rounded-sm border-2 border-orange-600 p-2" />
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Síremlék alapterülete:</label>
              <input v-model="form.area" type="text" placeholder="Alapterület" class="w-full rounded-sm border-2 border-orange-600 p-2" />
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Anyag:</label>
              <input v-model="form.material" type="text" placeholder="Anyag" class="w-full rounded-sm border-2 border-orange-600 p-2" />
              <RouterLink :to="{name: 'ko-anyagminta'}"
              class="border-2 border-orange-600 text-white font-semibold rounded-sm p-2 mt-1 disabled:opacity-50 disabled:cursor-not-allowed w-full text-center"
              >
                Keresés
              </RouterLink>
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Alsórész (kódszám):</label>
              <input v-model="form.base_code" type="text" placeholder="Kódszám" class="w-full rounded-sm border-2 border-orange-600 p-2"/>
              <RouterLink :to="{name: 'sirko'}"
              class="border-2 border-orange-600 text-white font-semibold rounded-sm p-2 mt-1 disabled:opacity-50 disabled:cursor-not-allowed w-full text-center"
              >
                Keresés
              </RouterLink>
            </div>
          </div>
          <!-- Step 2 -->
          <div class="flex flex-col gap-4 w-full">
            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Emlék (fejrész, kódszám):</label>
              <input v-model="form.head_code" type="text" placeholder="Kódszám" class="w-full rounded-sm border-2 border-orange-600 p-2" />
              <RouterLink :to="{name: 'sirko'}"
              class="border-2 border-orange-600 text-white font-semibold rounded-sm p-2 mt-1 disabled:opacity-50 disabled:cursor-not-allowed w-full text-center"
              >
                Keresés
              </RouterLink>
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Kiegészítők:</label>
              <input v-model="form.extras" type="text" placeholder="Pl.: kereszt, váza, mécses..." class="w-full rounded-sm border-2 border-orange-600 p-2" />
              <RouterLink :to="{name: 'sirko-kellekek'}"
              class="border-2 border-orange-600 text-white font-semibold rounded-sm p-2 mt-1 disabled:opacity-50 disabled:cursor-not-allowed w-full text-center"
              >
                Keresés
              </RouterLink>
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Felirat típusa:</label>
              <select
              v-model="form.inscription_type"
              class="w-full rounded-sm border-2 border-orange-600 p-2 bg-white text-black"
              >
                <option disabled value="">Válassz típust</option>
                <option value="Natúr">Natúr</option>
                <option value="Arany">Arany</option>
                <option value="Relief">Relief</option>
                <option value="Bronz">Bronz</option>
              </select>
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Sírfelirat:</label>
              <textarea v-model="form.inscription" placeholder="Sírfelirat" class="w-full rounded-sm border-2 border-orange-600 p-2" rows="3"></textarea>
            </div>

            <div class="flex flex-col">
              <label class="mb-2 font-semibold text-white">Üzenet:</label>
              <textarea v-model="form.message" placeholder="Üzenet" class="w-full rounded-sm border-2 border-orange-600 p-2" rows="5"></textarea>
            </div>
          </div>
        </div>
        <!-- Button -->
        <button
          type="submit"
          :disabled="isLoading"
          class="bg-orange-600 text-white font-semibold rounded-sm p-2 mt-4 hover:bg-orange-700 disabled:opacity-50 disabled:cursor-not-allowed w-full"
        >
          <span v-if="isLoading">Küldés...</span>
          <span v-else>Ajánlatkérés küldése</span>
        </button>
      </form>
    </div>

    <!-- Floating message az oldal alján -->
    <transition name="fade">
      <div
        v-if="showMessage"
        :class="messageClass"
        class="fixed bottom-5 left-1/2 transform -translate-x-1/2 px-6 py-3 rounded shadow-lg font-semibold z-50"
      >
        {{ message }}
      </div>
    </transition>
  </BaseLayout>
</template>

<script setup>
import { reactive, ref, watch } from 'vue'
import { useContactStore } from '@stores/contactStore'
import BaseLayout from '@layouts/BaseLayout.vue'

const contactStore = useContactStore()

// --- FORM ADATOK ---
const form = reactive({
  name: '',
  email: '',
  phone: '',
  cemetery: '',
  area: '',
  material: '',
  base_code: '',
  head_code: '',
  extras: '',
  inscription_type: '',
  inscription: '',
  message: ''
})

// --- LOCALSTORAGE VISSZATÖLTÉS ---
const savedForm = localStorage.getItem('offerForm')
if (savedForm) {
  Object.assign(form, JSON.parse(savedForm))
}

// --- WATCH: FORM AUTOMATIKUS MENTÉSE LOCALSTORAGE-BA ---
watch(form, (newVal) => {
  localStorage.setItem('offerForm', JSON.stringify(newVal))
}, { deep: true })

// --- FLOATING MESSAGE ---
const showMessage = ref(false)
const message = ref('')
const messageClass = ref('bg-green-600 text-white')
const isLoading = ref(false)

// --- KÜLDÉS ---
const handleSubmit = async () => {
  isLoading.value = true

  try {
    await contactStore.sendOffer(form)

    // Form ürítés
    Object.keys(form).forEach(key => form[key] = '')

    // LocalStorage törlése
    localStorage.removeItem('offerForm')

    // Siker üzenet
    message.value = 'Ajánlatkérés sikeresen elküldve!'
    messageClass.value = 'bg-green-600 text-white'
    showMessage.value = true

  } catch (err) {
    console.error('Hiba az ajánlatkérés küldésekor:', err)

    // Hiba üzenet
    message.value = 'Hiba történt a küldés során.'
    messageClass.value = 'bg-red-600 text-white'
    showMessage.value = true

  } finally {
    isLoading.value = false
    setTimeout(() => {
      showMessage.value = false
    }, 2000)
  }
}
</script>


<style>
/* Fade animáció a floating üzenethez */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

<route lang="json">
{
  "name": "ajanlatkeres",
  "meta": {
    "title": "Ajánlatkérés – Palásti és Társa Kft.",
    "description": "Kérjen ajánlatot egyedi síremlékekre, gravírozásra és kőfeldolgozásra a Palásti és Társa Kft.-től."
  }
}
</route>
