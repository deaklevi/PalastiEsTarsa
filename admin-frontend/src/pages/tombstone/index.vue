<template>
  <div v-if="isValidated" class="p-4 md:p-8 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight text-indigo-900">Sírkövek</h1>
        <p class="text-gray-500 text-sm italic">Termékkatalógus és cikkszámok kezelése</p>
      </div>
      <RouterLink to="/dashboard" class="flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800 bg-indigo-50 px-4 py-2 rounded-lg transition border border-indigo-100">
        <span>←</span> Vissza a Dashboardra
      </RouterLink>
    </div>

    <div class="max-w-7xl mx-auto space-y-8">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" 
           :class="editingId ? 'ring-2 ring-indigo-500 border-transparent' : ''">
        <div class="p-6 border-b border-gray-100 bg-indigo-50/30">
          <h2 class="text-lg font-bold text-indigo-900 flex items-center gap-2">
            <span class="w-3 h-3 rounded-full" :class="editingId ? 'bg-indigo-500 animate-pulse' : 'bg-gray-300'"></span>
            {{ editingId ? 'Sírkő adatainak módosítása' : 'Új sírkő rögzítése a katalógusba' }}
          </h2>
        </div>
        
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-1">
              <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest ml-1">Cikkszám (Azonosító) *</label>
              <input v-model="form.tombstone_id" type="text" placeholder="Pl. S-001" class="w-full border-gray-200 border p-3 rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition font-mono">
            </div>
            
            <div class="space-y-1 md:col-span-2">
              <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest ml-1">Megnevezés *</label>
              <input v-model="form.name" type="text" placeholder="Pl. Modern Gránit Emlékmű" class="w-full border-gray-200 border p-3 rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition">
            </div>

            <div class="space-y-1 md:col-span-3">
              <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest ml-1">Leírás *</label>
              <textarea v-model="form.description" rows="3" placeholder="Méretek, anyagok, extrák leírása..." class="w-full border-gray-200 border p-3 rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition"></textarea>
            </div>

            <div class="space-y-1">
              <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest ml-1">Kategória / Csoport</label>
              <input v-model="form.group" type="text" placeholder="Pl. Szimpla sírkő" class="w-full border-gray-200 border p-3 rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition">
            </div>

            <div class="space-y-1">
              <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest ml-1">Megjelenési sorrend</label>
              <input v-model="form.order" type="number" class="w-full border-gray-200 border p-3 rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition">
            </div>

            <div class="space-y-1">
              <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest ml-1">Kép feltöltése</label>
              <input type="file" @change="handleFileUpload" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition cursor-pointer border border-gray-200 p-1.5 rounded-xl">
            </div>
          </div>

          <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col md:flex-row gap-3 justify-end">
            <button v-if="editingId" @click="cancelEdit" class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">
              Mégse
            </button>
            <button @click="saveItem" class="px-12 py-3 rounded-xl font-bold text-white shadow-lg transition transform active:scale-95 bg-indigo-600 hover:bg-indigo-700 shadow-indigo-200">
              {{ editingId ? 'Változtatások mentése' : 'Sírkő hozzáadása' }}
            </button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-gray-50 border-b border-gray-200 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">
                <th class="p-4 w-20 text-center">Sorszám</th>
                <th class="p-4 w-24">Fotó</th>
                <th class="p-4">Cikkszám / Név</th>
                <th class="p-4">Kategória</th>
                <th class="p-4 text-right">Műveletek</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr v-for="item in tombstones" :key="item.id" class="hover:bg-indigo-50/30 transition-colors">
                <td class="p-4 text-center font-mono text-gray-400">#{{ item.order }}</td>
                <td class="p-4">
                  <div class="h-20 w-20 bg-gray-100 rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                    <img v-if="item.image_url" :src="BaseURL + item.image_url" class="h-full w-full object-cover">
                    <div v-else class="h-full flex items-center justify-center text-[10px] text-gray-300 font-bold uppercase p-2 text-center">Nincs fotó</div>
                  </div>
                </td>
                <td class="p-4">
                  <div class="text-xs font-black text-indigo-600 font-mono">{{ item.tombstone_id }}</div>
                  <div class="font-bold text-gray-800">{{ item.name }}</div>
                  <div class="text-xs text-gray-400 line-clamp-1 max-w-xs">{{ item.description }}</div>
                </td>
                <td class="p-4">
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-100 text-indigo-700 uppercase">
                    {{ item.group }}
                  </span>
                </td>
                <td class="p-4 text-right">
                  <div class="flex justify-end gap-2">
                    <button @click="editItem(item)" class="p-2 text-indigo-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.5 2.5 0 113.536 3.536L12 20.414a4 4 0 01-1.414.586l-4 1 1-4a4 4 0 01.586-1.414L18.586 2.586z" /></svg>
                    </button>
                    <button @click="deleteItem(item.id)" class="p-2 text-red-300 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <div v-else class="h-screen flex justify-center items-center bg-white">
    <div class="w-10 h-10 border-4 border-indigo-600 border-t-transparent rounded-full animate-spin"></div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { http } from '@utils/http.mjs'
import { useRouter } from 'vue-router'

const router = useRouter()
const isValidated = ref(false)
const tombstones = ref([])
const editingId = ref(null)
const BaseURL = import.meta.env.VITE_API_BASE_URL || ''

const initialForm = {
  tombstone_id: '',
  name: '',
  description: '',
  group: '',
  order: 1,
  image: null
}

const form = ref({ ...initialForm })

onMounted(async () => {
  const token = localStorage.getItem('token')
  if (!token) return router.push('/')
  try {
    await http.get('/admin/protected-data')
    isValidated.value = true
    await fetchItems()
  } catch (err) { router.push('/') }
})

const fetchItems = async () => {
  try {
    const res = await http.get('/tombstones')
    tombstones.value = res.data.data
  } catch (err) { console.error(err) }
}

const handleFileUpload = (e) => {
  const file = e.target.files[0]
  if (file) form.value.image = file
}

const saveItem = async () => {
  if (!form.value.name || !form.value.tombstone_id || !form.value.description) {
    alert('Név, cikkszám és leírás megadása kötelező!')
    return
  }

  const formData = new FormData()
  Object.keys(form.value).forEach(key => {
    if (form.value[key] !== null) formData.append(key, form.value[key])
  })

  try {
    if (editingId.value) {
      formData.append('_method', 'PUT')
      await http.post(`/admin/tombstones/${editingId.value}`, formData)
    } else {
      await http.post('/admin/tombstones', formData)
    }
    cancelEdit()
    await fetchItems()
    alert('Sikeres mentés!')
  } catch (err) { alert('Hiba történt.') }
}

const editItem = (item) => {
  editingId.value = item.id
  form.value = {
    tombstone_id: item.tombstone_id,
    name: item.name,
    description: item.description,
    group: item.group,
    order: item.order,
    image: null
  }
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const cancelEdit = () => {
  editingId.value = null
  form.value = { ...initialForm }
}

const deleteItem = async (id) => {
  if (confirm('Véglegesen törlöd ezt a sírkövet?')) {
    try {
      await http.delete(`/admin/tombstones/${id}`)
      await fetchItems()
    } catch (err) { alert('Hiba történt a törléskor.') }
  }
}
</script>

<router lang="json">
{
    "name": "Tombstone",
    "meta": { "requiresAuth": true }
}
</router>