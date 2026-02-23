<template>
  <BaseLayout>
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Ajánlatkérés</h2>
    </div>

    <div class="mx-auto mt-5 md:mt-10 w-[90%] lg:max-w-4xl">
      <p class="text-base text-left">
        Az alábbi űrlap alapvetően síremlék árajánlat kérésére vonatkozik,
        <span class="text-orange-600 font-semibold uppercase"> minden mező kitöltése szükséges.</span>
        Abban az esetben, ha más, egyéb termék iránt érdeklődik, a kapcsolat oldalon lévő üzenetdobozban elküldheti ajánlatkérését vagy közvetlenül megkereshet minket e-mail-en vagy telefonon.
      </p>
    </div>

    <div class="bg-slate-950 md:w-full max-w-4xl p-6 md:p-10 mx-auto rounded-md mt-5 md:mt-10 mb-24 md:mb-52 w-[90%] shadow-xl">
      <form @submit.prevent="handleSubmit" class="space-y-6">
        
        <div class="flex flex-col lg:flex-row gap-6">
          
          <div class="flex flex-col gap-4 w-full">
            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Név:</label>
              <input v-model="form.name" type="text" placeholder="Név" class="input-field" required />
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">E-mail cím:</label>
              <input v-model="form.email" type="email" placeholder="Email" class="input-field" required />
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Telefonszám:</label>
              <input v-model="form.phone" type="text" placeholder="Telefonszám" class="input-field" />
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Temető (város):</label>
              <input v-model="form.cemetery" type="text" placeholder="Temető (város)" class="input-field" />
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Síremlék alapterülete:</label>
              <input v-model="form.area" type="text" placeholder="Alapterület" class="input-field" />
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Anyag:</label>
              <div class="flex flex-col gap-1">
                <input v-model="form.material" type="text" placeholder="Anyag" class="input-field" />
                <RouterLink :to="{name: 'ko-anyagminta'}" class="btn-action">Keresés</RouterLink>
              </div>
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Alsórész (kódszám):</label>
              <div class="flex flex-col gap-1">
                <input v-model="form.base_code" type="text" placeholder="Kódszám" class="input-field"/>
                <RouterLink :to="{name: 'sirko'}" class="btn-action">Keresés</RouterLink>
              </div>
            </div>
          </div>

          <div class="flex flex-col gap-4 w-full">
            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Emlék (fejrész, kódszám):</label>
              <div class="flex flex-col gap-1">
                <input v-model="form.head_code" type="text" placeholder="Kódszám" class="input-field" />
                <RouterLink :to="{name: 'sirko'}" class="btn-action">Keresés</RouterLink>
              </div>
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Kiegészítők:</label>
              <div class="flex flex-col gap-1">
                <input v-model="form.extras" type="text" placeholder="Pl.: kereszt, váza, mécses..." class="input-field" />
                <RouterLink :to="{name: 'sirko-kellekek'}" class="btn-action">Keresés</RouterLink>
              </div>
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Felirat típusa:</label>
              <select v-model="form.inscription_type" class="input-field bg-white">
                <option disabled value="">Válassz típust</option>
                <option v-for="t in ['Natúr', 'Arany', 'Relief', 'Bronz']" :key="t" :value="t">{{t}}</option>
              </select>
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Sírfelirat:</label>
              <textarea v-model="form.inscription" placeholder="Sírfelirat" class="input-field" rows="3"></textarea>
            </div>

            <div class="flex flex-col">
              <label class="mb-1.5 font-semibold text-white text-sm">Üzenet:</label>
              <textarea v-model="form.message" placeholder="Üzenet" class="input-field" rows="5"></textarea>
            </div>
          </div>
        </div>

        <button
          type="submit"
          :disabled="isLoading"
          class="bg-orange-600 text-white font-bold uppercase tracking-wider rounded-sm p-3 mt-4 hover:bg-orange-700 disabled:opacity-50 disabled:cursor-not-allowed w-full transition-colors duration-300"
        >
          <span v-if="isLoading">Küldés...</span>
          <span v-else>Ajánlatkérés küldése</span>
        </button>
      </form>
    </div>

    <Teleport to="body">
      <transition name="fade">
        <div v-if="showMessage" :class="messageClass" class="fixed bottom-5 left-1/2 -translate-x-1/2 px-6 py-3 rounded shadow-2xl font-bold z-50">
          {{ message }}
        </div>
      </transition>
    </Teleport>
  </BaseLayout>
</template>

<script setup>
import { reactive, ref, watch, onMounted } from 'vue'
import { useContactStore } from '@stores/contactStore'
import BaseLayout from '@layouts/BaseLayout.vue'

const contactStore = useContactStore()
const isLoading = ref(false)
const showMessage = ref(false)
const message = ref('')
const messageClass = ref('')

const form = reactive({
  name: '', email: '', phone: '', cemetery: '', area: '', material: '',
  base_code: '', head_code: '', extras: '', inscription_type: '', inscription: '', message: ''
})

onMounted(() => {
  const saved = localStorage.getItem('offerForm')
  if (saved) Object.assign(form, JSON.parse(saved))
})

watch(form, (newVal) => {
  localStorage.setItem('offerForm', JSON.stringify(newVal))
}, { deep: true })

const handleSubmit = async () => {
  isLoading.value = true
  try {
    await contactStore.sendOffer(form)
    Object.keys(form).forEach(key => form[key] = '')
    localStorage.removeItem('offerForm')
    showNotification('Ajánlatkérés sikeresen elküldve!', 'bg-green-600 text-white')
  } catch (err) {
    showNotification('Hiba történt a küldés során.', 'bg-red-600 text-white')
  } finally {
    isLoading.value = false
  }
}

const showNotification = (text, css) => {
  message.value = text
  messageClass.value = css
  showMessage.value = true
  setTimeout(() => showMessage.value = false, 3000)
}
</script>

<style scoped>
/* A te színeid pontosan visszaállítva, de Tailwind-del finomítva */
.input-field {
  @apply w-full rounded-sm border-2 border-orange-600 p-2 text-black bg-white focus:ring-0 focus:outline-none placeholder:text-gray-400;
}

.btn-action {
  @apply border-2 border-orange-600 text-white font-semibold rounded-sm p-2 mt-1 text-center transition-all duration-300 hover:bg-orange-600/20 active:bg-orange-600;
}

.fade-enter-active, .fade-leave-active { transition: opacity 0.5s; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
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
