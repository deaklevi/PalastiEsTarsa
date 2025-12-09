<template>
  <div class="flex flex-col items-center md:mx-12">
    <h2 class="mt-5 md:mt-10 text-xl font-bold w-full text-center md:text-left">Kapcsolat</h2>
  </div>

  <div
    class="flex xl:flex-row flex-col xl:items-center justify-center xl:justify-between mt-5 md:mt-10 max-w-[1500px] mx-auto xl:w-[90%]"
  >
    <iframe
      class="mx-auto xl:mx-0 xl:w-[50%] w-[90%] h-[450px]"
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d477.3589620649822!2d19.0526161349237!3d47.4051136213671!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e7c8d2b9cd75%3A0xebe62123ff0173d0!2zUGFsw6FzdGkgw6lzIFTDoXJzYSBLZnQu!5e0!3m2!1shu!2shu!4v1765231742459!5m2!1shu!2shu"
      style="border:0;"
      allowfullscreen
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>

    <div class="xl:mt-0 mt-20 xl:m-0 md:m-28 m-10">
      <img class="h-20 mb-3" src="../../../public/Kapcsolat/emblema.png" alt="Palásti és Társa Kft. embléma" />
      <h1 class="mb-12">Palásti és Társa Kőfeldolgozó Kft.</h1>

      <p><span class="text-orange-600 font-semibold">Cím:</span> Hungary - 1214 Budapest, Rákóczi Ferenc út 251.</p>
      <p><span class="text-orange-600 font-semibold">E-mail:</span> palasti.kft@gmail.com</p>
      <br />
      <p>
        <span class="text-orange-600 font-semibold">Palásti István</span>/ügyvezető/
        <a href="tel:+36302790261" class="underline">+36-30-279-0261</a>
      </p>
      <p>
        <span class="text-orange-600 font-semibold">Deák László</span>/telepvezető/
        <a href="tel:+36309004800" class="underline">+36-30-900-4800</a>
      </p>
      <p>
        <span class="text-orange-600 font-semibold">Iroda:</span>
        <a href="tel:+3612768246" class="underline">+36-1-276-8246</a>
      </p>
      <br />
      <p><span class="text-orange-600 font-semibold">Nyitvatartás:</span></p>
      <p>Hétfő - Péntek: 07:30 - 16:30</p>
      <p>Szombat: 09:00 - 12:00</p>
      <p>Vasárnap: Zárva</p>
      <br />
      <p>Telefonos egyeztetés alapján ettől eltérhetünk.</p>
    </div>
  </div>

  <div class="contact-form max-w-lg mx-auto p-4 mt-10">
    <h2 class="text-xl font-bold mb-4">Írjon nekünk</h2>

    <FormKit type="form" @submit="handleSubmit" :submit-label="'Küldés'">
      <FormKit
        name="name"
        label="Név"
        type="text"
        validation="required"
        placeholder="Írja be a nevét"
      />
      <FormKit
        name="email"
        label="E-mail"
        type="email"
        validation="required|email"
        placeholder="Írja be az e-mail címét"
      />
      <FormKit
        name="subject"
        label="Tárgy"
        type="text"
        validation="required"
        placeholder="Tárgy"
      />
      <FormKit
        name="message"
        label="Üzenet"
        type="textarea"
        validation="required"
        placeholder="Üzenet"
      />
    </FormKit>

    <div v-if="contactStore.success" class="mt-4 text-green-600">Üzenet sikeresen elküldve!</div>
    <div v-if="contactStore.error" class="mt-4 text-red-600">Hiba történt: {{ contactStore.error }}</div>
  </div>
</template>

<script setup>
import { useContactStore } from '@stores/contactStore'

const contactStore = useContactStore()

const handleSubmit = async (formData) => {
  try {
    await contactStore.sendContact(formData)
  } catch (err) {
    console.error('Hiba a contact form küldésekor:', err)
  }
}
</script>


<route lang="json">
{
  "name": "kapcsolat",
  "meta": {
    "title": "Kapcsolat – Palásti és Társa Kft.",
    "description": "A Kő – legyen az gránit, márvány vagy mészkő – az életünk! A kőfeldolgozás valamennyi területén megálljuk a helyünket. 1954 óta rengeteg tapasztalatot gyűjtöttünk az egyedi kézműves síremlékek, kripták, emlékművek, szökőkutak és minden egyéb épülethez tartozó kőburkolat, kőtermék készítésében, kerüljön az kültérre vagy beltérre."
  }
}
</route>
