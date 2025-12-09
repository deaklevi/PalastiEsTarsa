<template>
  <BaseLayout>
    <!-- Kapcsolat fejléc -->
    <div class="flex flex-col items-center md:mx-12">
      <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kapcsolat</h2>
    </div>

    <!-- Google Maps + cégadatok -->
    <div class="flex xl:flex-row flex-col xl:items-center justify-center xl:justify-between mt-5 md:mt-10 max-w-[1500px] mx-auto xl:w-[90%]">
      <iframe
        class="mx-auto xl:mx-0 xl:w-[50%] w-[90%] h-[450px]"
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d477.3589620649822!2d19.0526161349237!3d47.4051136213671!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e7c8d2b9cd75%3A0xebe62123ff0173d0!2zUGFsw6FzdGkgw6lzIFTDoXJzYSBLZnQu!5e0!3m2!1shu!2shu!4v1765231742459!5m2!1shu!2shu"
        style="border:0;"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>

      <div class="xl:mt-0 mt-20 xl:m-0 md:m-28 md:mb-0 m-10 mb-0">
        <img class="h-20 mb-3" src="../../../public/Kapcsolat/emblema.png" alt="Palásti és Társa Kft. embléma" />
        <h1 class="mb-12">Palásti és Társa Kőfeldolgozó Kft.</h1>
        <p><span class="text-orange-600 font-semibold">Cím:</span> Hungary - 1214 Budapest, Rákóczi Ferenc út 251.</p>
        <p><span class="text-orange-600 font-semibold">E-mail:</span> palasti.kft@gmail.com</p>
        <br />
        <p><span class="text-orange-600 font-semibold">Palásti István</span>/ügyvezető/<a href="tel:+36302790261" class="underline">+36-30-279-0261</a></p>
        <p><span class="text-orange-600 font-semibold">Deák László</span>/telepvezető/<a href="tel:+36309004800" class="underline">+36-30-900-4800</a></p>
        <p><span class="text-orange-600 font-semibold">Iroda:</span><a href="tel:+3612768246" class="underline">+36-1-276-8246</a></p>
        <br />
        <p><span class="text-orange-600 font-semibold">Nyitvatartás:</span></p>
        <p>Hétfő - Péntek: 07:30 - 16:30</p>
        <p>Szombat: 09:00 - 12:00</p>
        <p>Vasárnap: Zárva</p>
        <br />
        <p>Telefonos egyeztetés alapján ettől eltérhetünk.</p>
      </div>
    </div>

    <!-- Form fejléce -->
    <div class="flex flex-col items-center md:mx-12 mt-10">
      <h2 class="text-xl font-bold w-full text-center md:text-left">Írjon nekünk</h2>
    </div>

    <!-- Kapcsolat form -->
    <div class="bg-slate-950 md:w-full max-w-lg p-10 mx-auto rounded-md mt-5 md:mt-10 mb-24 md:mb-52 w-[90%]">
      <form @submit.prevent="handleSubmit" class="flex flex-col gap-4">
        <div class="flex flex-col">
          <label class="mb-2 font-semibold text-white" for="name">Név:</label>
          <input
            id="name"
            v-model="form.name"
            type="text"
            placeholder="Írja be a nevét"
            class="w-full rounded-sm border-2 border-orange-600 p-2"
            required
          />
        </div>

        <div class="flex flex-col">
          <label class="mb-2 font-semibold text-white" for="email">E-mail:</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            placeholder="Írja be az e-mail címét"
            class="w-full rounded-sm border-2 border-orange-600 p-2"
            required
          />
        </div>

        <div class="flex flex-col">
          <label class="mb-2 font-semibold text-white" for="subject">Tárgy:</label>
          <input
            id="subject"
            v-model="form.subject"
            type="text"
            placeholder="Tárgy"
            class="w-full rounded-sm border-2 border-orange-600 p-2"
            required
          />
        </div>

        <div class="flex flex-col">
          <label class="mb-2 font-semibold text-white" for="message">Üzenet:</label>
          <textarea
            id="message"
            v-model="form.message"
            placeholder="Üzenet"
            class="w-full rounded-sm border-2 border-orange-600 p-2"
            rows="5"
            required
          ></textarea>
        </div>

        <!-- Küldés gomb loadinggal -->
        <button
          type="submit"
          :disabled="isLoading"
          class="bg-orange-600 text-white font-semibold rounded-sm p-2 mt-4 hover:bg-orange-700 disabled:opacity-50 disabled:cursor-not-allowed"
        >
          <span v-if="isLoading">Küldés...</span>
          <span v-else>Üzenet küldés</span>
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
import { reactive, ref } from 'vue'
import { useContactStore } from '@stores/contactStore'
import BaseLayout from '@layouts/BaseLayout.vue'

const contactStore = useContactStore()

const form = reactive({
  name: '',
  email: '',
  subject: '',
  message: ''
})

// Floating üzenet és loading állapot
const showMessage = ref(false)
const message = ref('')
const messageClass = ref('bg-green-600 text-white')
const isLoading = ref(false)

const handleSubmit = async () => {
  isLoading.value = true
  try {
    await contactStore.sendContact(form)

    // Form törlése
    form.name = ''
    form.email = ''
    form.subject = ''
    form.message = ''

    // Siker üzenet
    message.value = 'Üzenet sikeresen elküldve!'
    messageClass.value = 'bg-green-600 text-white'
    showMessage.value = true
  } catch (err) {
    console.error('Hiba a contact form küldésekor:', err)

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
  "name": "kapcsolat",
  "meta": {
    "title": "Kapcsolat – Palásti és Társa Kft.",
    "description": "A Kő – legyen az gránit, márvány vagy mészkő – az életünk! A kőfeldolgozás valamennyi területén megálljuk a helyünket. 1954 óta rengeteg tapasztalatot gyűjtöttünk az egyedi kézműves síremlékek, kripták, emlékművek, szökőkutak és minden egyéb épülethez tartozó kőburkolat, kőtermék készítésében, kerüljön az kültérre vagy beltérre."
  }
}
</route>
