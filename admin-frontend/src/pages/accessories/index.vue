<template>
  <div v-if="isValidated" class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Sírkő kellékek kezelése</h1>
      <RouterLink to="/dashboard" class="text-blue-600 hover:underline">← Vissza a Dashboardra</RouterLink>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8 border-t-4" :class="editingId ? 'border-blue-500' : 'border-green-500'">
      <h2 class="text-lg font-semibold mb-4 text-gray-700">
        {{ editingId ? 'Kiegészítő szerkesztése' : 'Új kiegészítő hozzáadása' }}
      </h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Megnevezés *</label>
          <input v-model="form.name" type="text" placeholder="Pl. Szögletes váza" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Típus *</label>
          <input v-model="form.type" type="text" placeholder="Pl. Kőváza" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Méretek *</label>
          <input v-model="form.size" type="text" placeholder="Pl. 20x10x10cm" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>

        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Ajánlott kőfajta *</label>
          <input v-model="form.recommended_type" type="text" placeholder="Pl. Gránit, Márvány" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Technológia *</label>
          <input v-model="form.manufacturing_technology" type="text" placeholder="Pl. Fényezett" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Csoport (ID) *</label>
          <input v-model="form.group" type="text" placeholder="Pl. NR1" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>

        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Egyedi azonosító (opcionális)</label>
          <input v-model="form.accessory_id" type="text" placeholder="Pl. NR-01" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Sorrend (szám)</label>
          <input v-model="form.order" type="number" placeholder="Pozíció a listában" class="border p-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>
        
        <div class="flex flex-col">
          <label class="text-xs font-semibold text-gray-500 mb-1 ml-1">Kép feltöltése</label>
          <input type="file" @change="handleFileUpload" class="text-sm border p-1.5 rounded bg-gray-50">
        </div>

        <div class="md:col-span-3 flex gap-2 justify-end mt-2">
          <button v-if="editingId" @click="cancelEdit" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">Mégse</button>
          <button @click="saveItem" class="bg-green-600 text-white px-8 py-2 rounded hover:bg-green-700 transition font-bold shadow-md">
            {{ editingId ? 'Változtatások mentése' : 'Kiegészítő rögzítése' }}
          </button>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
      <table class="w-full text-left border-collapse">
        <thead class="bg-gray-100 border-b border-gray-200">
          <tr>
            <th class="p-4 text-xs font-bold text-gray-600 uppercase">#</th>
            <th class="p-4 text-xs font-bold text-gray-600 uppercase">Kép</th>
            <th class="p-4 text-xs font-bold text-gray-600 uppercase">Név / Adatok</th>
            <th class="p-4 text-xs font-bold text-gray-600 uppercase">Csoport</th>
            <th class="p-4 text-xs font-bold text-gray-600 uppercase text-right">Műveletek</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <tr v-for="item in accessories" :key="item.id" class="hover:bg-blue-50/30 transition">
            <td class="p-4 text-sm font-mono text-gray-400">{{ item.order }}</td>
            <td class="p-4">
              <div class="h-16 w-16 bg-gray-100 rounded border flex items-center justify-center overflow-hidden shadow-sm">
                <img :src="BaseURL + item.image_url" class="h-full w-full object-cover" v-if="item.image_url">
                <span v-else class="text-[10px] text-gray-400 uppercase font-bold text-center">Nincs kép</span>
              </div>
            </td>
            <td class="p-4">
              <div class="font-bold text-gray-800">{{ item.name }}</div>
              <div class="text-xs text-gray-500 mt-1">
                <span class="bg-gray-100 px-1 rounded">{{ item.type }}</span> | 
                <span class="italic">{{ item.size }}</span>
              </div>
              <div class="text-[10px] text-blue-500 mt-1 font-semibold uppercase">{{ item.accessory_id }}</div>
            </td>
            <td class="p-4">
              <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full font-medium">{{ item.group }}</span>
            </td>
            <td class="p-4 text-right space-x-2">
              <button @click="editItem(item)" class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white px-3 py-1 rounded transition text-xs font-bold shadow-sm">Szerkesztés</button>
              <button @click="deleteItem(item.id)" class="bg-red-50 text-red-600 hover:bg-red-600 hover:text-white px-3 py-1 rounded transition text-xs font-bold shadow-sm">Törlés</button>
            </td>
          </tr>
          <tr v-if="accessories.length === 0">
            <td colspan="5" class="p-10 text-center text-gray-400 italic">Nincs megjeleníthető adat.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div v-else class="h-screen flex flex-col justify-center items-center bg-gray-50">
    <div class="w-12 h-12 border-4 border-green-500 border-t-transparent rounded-full animate-spin"></div>
    <p class="text-gray-500 mt-4 font-medium tracking-widest">ADMIN HITELESÍTÉS...</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { http } from '@utils/http.mjs'
import { useRouter } from 'vue-router'

const router = useRouter()
const isValidated = ref(false)
const accessories = ref([])
const editingId = ref(null)
const BaseURL = import.meta.env.VITE_API_BASE_URL || ''

// Kezdő értékek objektuma (újrafelhasználható)
const initialForm = {
  name: '',
  type: '',
  size: '',
  recommended_type: '',
  manufacturing_technology: '',
  group: '',
  order: null,
  accessory_id: '',
  image: null
}

const form = ref({ ...initialForm })

onMounted(async () => {
  const token = localStorage.getItem('token')
  if (!token) return router.push('/')

  try {
    // Védett route ellenőrzése
    await http.get('/admin/protected-data')
    isValidated.value = true
    await fetchItems()
  } catch (err) {
    console.error("Auth error:", err)
    router.push('/')
  }
})

const fetchItems = async () => {
  try {
    const res = await http.get('/accessories')
    // A Laravel Resource miatt res.data.data-ban vannak az elemek
    accessories.value = res.data.data
  } catch (err) {
    console.error("Fetch error:", err)
  }
}

const handleFileUpload = (e) => {
  const file = e.target.files[0]
  if (file) {
    form.value.image = file
  }
}

const saveItem = async () => {
  // Egyszerű validáció küldés előtt
  if (!form.value.name || !form.value.type || !form.value.group) {
    alert('Kérlek töltsd ki a kötelező mezőket (Név, Típus, Csoport)!')
    return
  }

  const formData = new FormData()
  
  // Minden mező hozzáadása a FormData-hoz
  Object.keys(form.value).forEach(key => {
    const value = form.value[key]
    if (value !== null && value !== undefined && value !== '') {
      formData.append(key, value)
    }
  })

  try {
    if (editingId.value) {
      // Laravel Update Hack (PUT kérés fájlfeltöltéssel csak így megy)
      formData.append('_method', 'PUT')
      await http.post(`/admin/accessories/${editingId.value}`, formData)
    } else {
      await http.post('/admin/accessories', formData)
    }
    
    alert('Sikeres mentés!')
    cancelEdit()
    await fetchItems()
  } catch (err) {
    console.error('Mentési hiba:', err.response?.data)
    const backendError = err.response?.data?.details || err.response?.data?.error || 'Ismeretlen hiba'
    alert('Hiba történt a mentés során: ' + backendError)
  }
}

const editItem = (item) => {
  editingId.value = item.id
  // Értékek átmásolása a formba (kép kivételével)
  form.value = {
    name: item.name || '',
    type: item.type || '',
    size: item.size || '',
    recommended_type: item.recommended_type || '',
    manufacturing_technology: item.manufacturing_technology || '',
    group: item.group || '',
    order: item.order || null,
    accessory_id: item.accessory_id || '',
    image: null // Szerkesztésnél újra fel kell tölteni a fájlt, ha módosítani akarjuk
  }
  // Gördítés a formhoz
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const cancelEdit = () => {
  editingId.value = null
  form.value = { ...initialForm }
}

const deleteItem = async (id) => {
  if (confirm('Valóban törölni szeretnéd ezt a tételt?')) {
    try {
      await http.delete(`/admin/accessories/${id}`)
      await fetchItems()
    } catch (err) {
      alert('Hiba a törlés során!')
    }
  }
}
</script>