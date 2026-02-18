<template>
  <div v-if="isValidated" class="p-4 md:p-8 min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Szolgáltatások & Árlista</h1>
        <p class="text-slate-500 text-sm">Bérvágások, fényezések és megmunkálási díjak kezelése</p>
      </div>
      <RouterLink to="/dashboard" class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
        <span>←</span> Dashboard
      </RouterLink>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
      <div class="lg:col-span-4">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 sticky top-8">
          <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h2 class="font-bold text-slate-800">{{ editingId ? 'Tétel szerkesztése' : 'Új tétel rögzítése' }}</h2>
            <span v-if="editingId" class="text-[10px] bg-amber-100 text-amber-600 px-2 py-1 rounded-md font-black uppercase">Szerkesztés mód</span>
          </div>
          
          <div class="p-6 space-y-4">
            <div class="space-y-1">
              <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Munkálat típusa *</label>
              <input v-model="form.type" type="text" placeholder="Pl. Bérvágás" class="w-full border-slate-200 border p-3 rounded-xl focus:ring-2 focus:ring-emerald-400 outline-none transition">
            </div>

            <div class="space-y-1">
              <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kőzet típusa</label>
              <input v-model="form.stone_type" type="text" placeholder="Pl. Gránit" class="w-full border-slate-200 border p-3 rounded-xl focus:ring-2 focus:ring-emerald-400 outline-none transition">
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Méret/Vastagság</label>
                <input v-model="form.size" type="text" placeholder="Pl. 2 cm" class="w-full border-slate-200 border p-3 rounded-xl focus:ring-2 focus:ring-emerald-400 outline-none transition">
              </div>
              <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Sorrend</label>
                <input v-model="form.order" type="number" class="w-full border-slate-200 border p-3 rounded-xl focus:ring-2 focus:ring-emerald-400 outline-none transition">
              </div>
            </div>

            <div class="space-y-1">
              <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Egységár (Ft) *</label>
              <div class="relative">
                <input v-model="form.price" type="number" class="w-full border-slate-200 border p-3 rounded-xl focus:ring-2 focus:ring-emerald-400 outline-none transition pr-12">
                <span class="absolute right-4 top-3.5 text-slate-400 font-bold">Ft</span>
              </div>
            </div>

            <div class="pt-4 flex flex-col gap-2">
              <button @click="saveItem" class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-slate-800 transition transform active:scale-95 shadow-lg">
                {{ editingId ? 'Módosítások mentése' : 'Hozzáadás az árlistához' }}
              </button>
              <button v-if="editingId" @click="cancelEdit" class="w-full bg-slate-100 text-slate-600 py-3 rounded-xl font-bold hover:bg-slate-200 transition">
                Mégse
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="lg:col-span-8">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
          <table class="w-full text-left">
            <thead>
              <tr class="bg-slate-50 border-b border-slate-200 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                <th class="p-4 w-12 text-center">#</th>
                <th class="p-4">Típus / Megnevezés</th>
                <th class="p-4">Méret / Anyag</th>
                <th class="p-4 text-right">Ár</th>
                <th class="p-4 text-right">Műveletek</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
              <tr v-for="item in works" :key="item.id" class="hover:bg-slate-50/50 transition-colors">
                <td class="p-4 text-center text-slate-400 font-mono text-xs">{{ item.order }}</td>
                <td class="p-4">
                  <div class="font-bold text-slate-800">{{ item.type }}</div>
                </td>
                <td class="p-4 text-sm text-slate-500">
                  <div v-if="item.stone_type">{{ item.stone_type }}</div>
                  <div v-if="item.size" class="text-xs italic">{{ item.size }}</div>
                </td>
                <td class="p-4 text-right">
                  <span class="font-mono font-bold text-emerald-600">{{ Number(item.price).toLocaleString() }} Ft</span>
                </td>
                <td class="p-4 text-right">
                  <div class="flex justify-end gap-1">
                    <button @click="editItem(item)" class="p-2 text-slate-400 hover:text-blue-600 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.5 2.5 0 113.536 3.536L12 20.414a4 4 0 01-1.414.586l-4 1 1-4a4 4 0 01.586-1.414L18.586 2.586z" /></svg>
                    </button>
                    <button @click="deleteItem(item.id)" class="p-2 text-slate-400 hover:text-red-600 transition">
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
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { http } from '@utils/http.mjs'
import { useRouter } from 'vue-router'

const router = useRouter()
const isValidated = ref(false)
const works = ref([])
const editingId = ref(null)

const initialForm = {
  type: '',
  stone_type: '',
  size: '',
  price: 0,
  order: 1
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
    const res = await http.get('/works')
    works.value = res.data.data
  } catch (err) { console.error(err) }
}

const saveItem = async () => {
  if (!form.value.type || form.value.price < 0) {
    alert('Típus és érvényes ár megadása kötelező!')
    return
  }

  try {
    if (editingId.value) {
      await http.put(`/admin/works/${editingId.value}`, form.value)
    } else {
      await http.post('/admin/works', form.value)
    }
    cancelEdit()
    await fetchItems()
    alert('Árlista frissítve!')
  } catch (err) { alert('Hiba történt mentéskor.') }
}

const editItem = (item) => {
  editingId.value = item.id
  form.value = { ...item }
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const cancelEdit = () => {
  editingId.value = null
  form.value = { ...initialForm }
}

const deleteItem = async (id) => {
  if (confirm('Törlöd ezt a szolgáltatást az árlistából?')) {
    try {
      await http.delete(`/admin/works/${id}`)
      await fetchItems()
    } catch (err) { alert('Hiba a törlésnél.') }
  }
}
</script>

<router lang="json">
{
    "name": "Work",
    "meta": { "requiresAuth": true }
}
</router>