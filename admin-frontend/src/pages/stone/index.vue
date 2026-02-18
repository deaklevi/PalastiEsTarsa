<template>
  <div v-if="isValidated" class="p-4 md:p-8 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Kő-anyagminták</h1>
        <p class="text-gray-500 text-sm">Gránit, márvány és mészkő minták kezelése</p>
      </div>
      <RouterLink to="/dashboard" class="flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-slate-800 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200 transition">
        <span>←</span> Műszerfal
      </RouterLink>
    </div>

    <div class="max-w-7xl mx-auto space-y-8">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" 
           :class="editingId ? 'ring-2 ring-slate-500' : ''">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-slate-50/50">
          <h2 class="text-lg font-bold text-slate-800">
            {{ editingId ? 'Anyagminta módosítása' : 'Új minta felvitele' }}
          </h2>
        </div>
        
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Megnevezés *</label>
              <input v-model="form.name" type="text" placeholder="Pl. Nero Impala" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-slate-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Származási hely *</label>
              <input v-model="form.origin" type="text" placeholder="Pl. Dél-Afrika" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-slate-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Alapszín / Árnyalat *</label>
              <input v-model="form.color" type="text" placeholder="Pl. Sötétszürke" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-slate-400 outline-none transition">
            </div>

            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Típus / Csoport *</label>
              <input v-model="form.group" type="text" placeholder="Pl. Gránit" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-slate-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Sorrend</label>
              <input v-model="form.order" type="number" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-slate-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Minta képe</label>
              <input type="file" @change="handleFileUpload" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-700 border border-dashed border-gray-300 p-1 rounded-xl">
            </div>
          </div>

          <div class="mt-8 pt-6 border-t border-gray-100 flex gap-3 justify-end">
            <button v-if="editingId" @click="cancelEdit" class="px-6 py-2.5 rounded-xl font-bold text-slate-600 hover:bg-gray-100 transition">Mégse</button>
            <button @click="saveItem" class="px-10 py-2.5 rounded-xl font-bold text-white shadow-lg bg-slate-800 hover:bg-slate-900 transition transform active:scale-95">
              {{ editingId ? 'Frissítés' : 'Minta mentése' }}
            </button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-gray-200 text-[11px] font-black text-slate-400 uppercase tracking-widest">
              <th class="p-4 w-16">#</th>
              <th class="p-4 w-24">Minta</th>
              <th class="p-4">Név / Származás</th>
              <th class="p-4">Szín</th>
              <th class="p-4">Típus</th>
              <th class="p-4 text-right">Műveletek</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr v-for="item in stones" :key="item.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="p-4 font-mono text-slate-400 text-sm">{{ item.order }}</td>
              <td class="p-4">
                <div class="h-16 w-16 bg-white rounded-lg border overflow-hidden shadow-inner">
                  <img :src="BaseURL + item.image_url" class="h-full w-full object-cover" v-if="item.image_url">
                  <div v-else class="h-full flex items-center justify-center bg-slate-100 text-[8px] text-slate-400">NINCS KÉP</div>
                </div>
              </td>
              <td class="p-4">
                <div class="font-bold text-slate-800">{{ item.name }}</div>
                <div class="text-xs text-slate-400">{{ item.origin }}</div>
              </td>
              <td class="p-4 text-sm text-slate-600">{{ item.color }}</td>
              <td class="p-4">
                <span class="px-2 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-bold uppercase">{{ item.group }}</span>
              </td>
              <td class="p-4 text-right">
                <div class="flex justify-end gap-1">
                  <button @click="editItem(item)" class="p-2 text-slate-400 hover:text-blue-600 transition"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg></button>
                  <button @click="deleteItem(item.id)" class="p-2 text-slate-400 hover:text-red-600 transition"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { http } from '@utils/http.mjs'
import { useRouter } from 'vue-router'

const router = useRouter()
const isValidated = ref(false)
const stones = ref([])
const editingId = ref(null)
const BaseURL = import.meta.env.VITE_API_BASE_URL || ''

const initialForm = {
  name: '',
  origin: '',
  color: '',
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
    const res = await http.get('/stones')
    stones.value = res.data.data
  } catch (err) { console.error(err) }
}

const handleFileUpload = (e) => {
  const file = e.target.files[0]
  if (file) form.value.image = file
}

const saveItem = async () => {
  if (!form.value.name || !form.value.origin || !form.value.color) {
    alert('Név, származás és szín kitöltése kötelező!')
    return
  }

  const formData = new FormData()
  Object.keys(form.value).forEach(key => {
    if (form.value[key] !== null) formData.append(key, form.value[key])
  })

  try {
    if (editingId.value) {
      formData.append('_method', 'PUT')
      await http.post(`/admin/stones/${editingId.value}`, formData)
    } else {
      await http.post('/admin/stones', formData)
    }
    cancelEdit()
    await fetchItems()
    alert('Sikeres mentés!')
  } catch (err) { alert('Hiba történt.') }
}

const editItem = (item) => {
  editingId.value = item.id
  form.value = {
    name: item.name,
    origin: item.origin,
    color: item.color,
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
  if (confirm('Törli ezt a kőmintát?')) {
    try {
      await http.delete(`/admin/stones/${id}`)
      await fetchItems()
    } catch (err) { alert('Hiba a törlésnél.') }
  }
}
</script>

<router lang="json">
{
    "name": "Stone",
    "meta": { "requiresAuth": true }
}
</router>