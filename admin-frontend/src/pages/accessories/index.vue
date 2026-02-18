<template>
  <div v-if="isValidated" class="p-4 md:p-8 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Sírkő kellékek</h1>
        <p class="text-gray-500 text-sm">Vázák, kiegészítők és tartozékok adminisztrációja</p>
      </div>
      <RouterLink to="/dashboard" class="flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-800 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200 transition">
        <span>←</span> Vissza a Dashboardra
      </RouterLink>
    </div>

    <div class="max-w-7xl mx-auto space-y-8">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300" 
           :class="editingId ? 'ring-2 ring-blue-500 border-transparent' : ''">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
          <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <span :class="editingId ? 'text-blue-500' : 'text-green-500'">●</span>
            {{ editingId ? 'Szerkesztési mód' : 'Új elem hozzáadása' }}
          </h2>
          <span v-if="editingId" class="text-xs font-bold uppercase tracking-wider text-blue-500 bg-blue-50 px-2 py-1 rounded">ID: #{{ editingId }}</span>
        </div>
        
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Megnevezés *</label>
              <input v-model="form.name" type="text" placeholder="Pl. Szögletes váza" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 focus:border-transparent outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Típus *</label>
              <input v-model="form.type" type="text" placeholder="Pl. Kőváza" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Méretek *</label>
              <input v-model="form.size" type="text" placeholder="Pl. 20x10x10cm" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition">
            </div>

            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Ajánlott kőfajta</label>
              <input v-model="form.recommended_type" type="text" placeholder="Pl. Gránit" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Technológia</label>
              <input v-model="form.manufacturing_technology" type="text" placeholder="Pl. Fényezett" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Csoport (ID) *</label>
              <input v-model="form.group" type="text" placeholder="Pl. NR1" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition text-sm font-mono">
            </div>

            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Cikkszám</label>
              <input v-model="form.accessory_id" type="text" placeholder="Pl. NR-01" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition text-sm font-mono uppercase">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Megjelenési sorrend</label>
              <input v-model="form.order" type="number" placeholder="0" class="w-full border-gray-200 border p-2.5 rounded-xl focus:ring-2 focus:ring-green-400 outline-none transition">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-gray-500 uppercase ml-1">Fotó</label>
              <div class="relative">
                <input type="file" @change="handleFileUpload" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition cursor-pointer border border-dashed border-gray-300 p-1 rounded-xl">
              </div>
            </div>
          </div>

          <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col md:flex-row gap-3 justify-end">
            <button v-if="editingId" @click="cancelEdit" class="px-6 py-2.5 rounded-xl font-bold text-gray-600 hover:bg-gray-100 transition">
              Mégse
            </button>
            <button @click="saveItem" class="px-10 py-2.5 rounded-xl font-bold text-white shadow-lg transition transform active:scale-95"
                    :class="editingId ? 'bg-blue-600 hover:bg-blue-700 shadow-blue-200' : 'bg-green-600 hover:bg-green-700 shadow-green-200'">
              {{ editingId ? 'Változtatások mentése' : 'Új elem rögzítése' }}
            </button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-gray-50/80 border-b border-gray-200">
                <th class="p-4 text-[11px] font-black text-gray-400 uppercase tracking-widest w-16">Sorrend</th>
                <th class="p-4 text-[11px] font-black text-gray-400 uppercase tracking-widest w-24">Kép</th>
                <th class="p-4 text-[11px] font-black text-gray-400 uppercase tracking-widest">Termék információ</th>
                <th class="p-4 text-[11px] font-black text-gray-400 uppercase tracking-widest">Besorolás</th>
                <th class="p-4 text-[11px] font-black text-gray-400 uppercase tracking-widest text-right">Műveletek</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr v-for="item in accessories" :key="item.id" class="hover:bg-gray-50/80 transition-colors group">
                <td class="p-4">
                  <span class="text-sm font-mono font-bold text-gray-400">#{{ item.order || 0 }}</span>
                </td>
                <td class="p-4">
                  <div class="h-16 w-16 bg-white rounded-xl border border-gray-100 flex items-center justify-center overflow-hidden shadow-sm group-hover:shadow-md transition">
                    <img :src="BaseURL + item.image_url" class="h-full w-full object-cover" v-if="item.image_url" alt="kellék">
                    <div v-else class="flex flex-col items-center opacity-20">
                      <span class="text-[8px] font-bold">NO IMG</span>
                    </div>
                  </div>
                </td>
                <td class="p-4">
                  <div class="font-black text-gray-800 text-base">{{ item.name }}</div>
                  <div class="flex items-center gap-2 mt-1">
                    <span class="text-[10px] font-bold px-2 py-0.5 bg-gray-100 text-gray-500 rounded uppercase tracking-tighter">{{ item.type }}</span>
                    <span class="text-xs text-gray-400 italic">{{ item.size }}</span>
                  </div>
                  <div class="text-[10px] font-mono text-blue-500 font-bold mt-1 tracking-widest">{{ item.accessory_id }}</div>
                </td>
                <td class="p-4">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-100">
                    {{ item.group }}
                  </span>
                </td>
                <td class="p-4 text-right">
                  <div class="flex justify-end gap-2">
                    <button @click="editItem(item)" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Szerkesztés">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                    </button>
                    <button @click="deleteItem(item.id)" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Törlés">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
              <tr v-if="accessories.length === 0">
                <td colspan="5" class="p-20 text-center">
                  <div class="flex flex-col items-center opacity-30">
                    <span class="text-4xl">📂</span>
                    <p class="mt-4 font-bold text-gray-500">Még nincs rögzített kellék.</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div v-else class="h-screen w-full flex flex-col justify-center items-center bg-white">
    <div class="relative flex items-center justify-center">
      <div class="absolute w-16 h-16 border-4 border-green-100 rounded-full"></div>
      <div class="w-16 h-16 border-4 border-green-600 border-t-transparent rounded-full animate-spin"></div>
    </div>
    <p class="text-gray-400 mt-6 font-black text-xs uppercase tracking-[0.3em]">Munkamenet ellenőrzése</p>
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
    accessories.value = res.data.data
  } catch (err) {
    console.error("Fetch error:", err)
  }
}

const handleFileUpload = (e) => {
  const file = e.target.files[0]
  if (file) form.value.image = file
}

const saveItem = async () => {
  if (!form.value.name || !form.value.type || !form.value.group) {
    alert('Kérlek töltsd ki a kötelező mezőket!')
    return
  }

  const formData = new FormData()
  Object.keys(form.value).forEach(key => {
    const value = form.value[key]
    if (value !== null && value !== undefined && value !== '') {
      formData.append(key, value)
    }
  })

  try {
    if (editingId.value) {
      formData.append('_method', 'PUT')
      await http.post(`/admin/accessories/${editingId.value}`, formData)
    } else {
      await http.post('/admin/accessories', formData)
    }
    
    alert('Sikeres mentés!')
    cancelEdit()
    await fetchItems()
  } catch (err) {
    const backendError = err.response?.data?.details || err.response?.data?.error || 'Hiba történt'
    alert(backendError)
  }
}

const editItem = (item) => {
  editingId.value = item.id
  form.value = {
    name: item.name || '',
    type: item.type || '',
    size: item.size || '',
    recommended_type: item.recommended_type || '',
    manufacturing_technology: item.manufacturing_technology || '',
    group: item.group || '',
    order: item.order || null,
    accessory_id: item.accessory_id || '',
    image: null
  }
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const cancelEdit = () => {
  editingId.value = null
  form.value = { ...initialForm }
}

const deleteItem = async (id) => {
  if (confirm('Biztosan törlöd?')) {
    try {
      await http.delete(`/admin/accessories/${id}`)
      await fetchItems()
    } catch (err) {
      alert('Hiba a törlés során!')
    }
  }
}
</script>