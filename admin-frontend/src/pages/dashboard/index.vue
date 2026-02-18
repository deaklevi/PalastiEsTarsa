<template>
  <div v-if="isValidated" class="min-h-screen bg-gray-50 p-6">
    <header class="max-w-7xl mx-auto flex justify-between items-center mb-10 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
      <div>
        <h1 class="text-2xl font-bold text-gray-800">Palásti Kft. Admin</h1>
        <p class="text-sm text-green-600 font-medium">Állapot: Hitelesített munkamenet</p>
      </div>
      <button @click="handleLogout" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-bold transition shadow-md">
        Kijelentkezés
      </button>
    </header>

    <main class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div v-for="menu in menuItems" :key="menu.path" class="bg-white p-6 rounded-xl shadow-md border-b-4 hover:shadow-lg transition group" :class="menu.color">
          <h3 class="text-xl font-bold text-gray-800 mb-2">{{ menu.title }}</h3>
          <p class="text-gray-500 text-sm mb-6">{{ menu.desc }}</p>
          <RouterLink :to="menu.path" class="inline-block w-full text-center bg-gray-800 text-white py-2 rounded-lg group-hover:bg-opacity-90 transition font-semibold">
            Szerkesztés megnyitása
          </RouterLink>
        </div>

      </div>
    </main>
  </div>
  
  <div v-else class="h-screen flex justify-center items-center bg-gray-50">
    <div class="animate-spin rounded-full h-12 w-12 border-4 border-green-500 border-t-transparent"></div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { http } from '@utils/http.mjs' 
import { useRouter } from 'vue-router'

const router = useRouter()
const isValidated = ref(false)

const menuItems = [
  { title: 'Sírkő kellékek', desc: 'Vázák, mécsestartók és kiegészítők kezelése.', path: '/accessories', color: 'border-green-500' },
  { title: 'Építészet', desc: 'Lépcsők, pultok és építészeti munkák.', path: '/architecture', color: 'border-blue-500' },
  { title: 'Kő-anyagminták', desc: 'Gránit, márvány és mészkő minták tára.', path: '/stone', color: 'border-yellow-500' },
  { title: 'Sírkövek', desc: 'Fő katalógus: sírkövek típusai és adatai.', path: '/tombstone', color: 'border-purple-500' },
  { title: 'Munkáink', desc: 'Referencia fotók és elvégzett munkák.', path: '/work', color: 'border-red-500' },
]

onMounted(async () => {
  const token = localStorage.getItem('token')
  if (!token) return router.push('/')

  try {
    await http.get('/admin/protected-data')
    isValidated.value = true
  } catch (err) {
    localStorage.removeItem('token')
    router.push('/')
  }
})

const handleLogout = () => {
  localStorage.removeItem('token')
  router.push('/')
}
</script>

<router lang="json">
{
    "name": "Dashboard",
    "meta": { "requiresAuth": true }
}
</router>

<style scoped>
.dashboard { 
  padding: 20px; 
  font-family: sans-serif;
}

header { 
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  border-bottom: 2px solid #eee; 
  padding-bottom: 15px; 
}

.stats-card { 
  background: #f0fdf4; 
  border-left: 5px solid #22c55e;
  padding: 25px; 
  border-radius: 8px; 
  margin-top: 30px; 
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.logout-btn { 
  background: #ef4444; 
  color: white; 
  border: none; 
  padding: 10px 20px; 
  border-radius: 6px; 
  cursor: pointer; 
  font-weight: bold;
  transition: background 0.2s;
}

.logout-btn:hover {
  background: #dc2626;
}

.loading-overlay {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-size: 1.2rem;
  color: #666;
}

.admin-actions {
  margin-top: 20px;
  padding-top: 15px;
  border-top: 1px solid #dcfce7;
}
</style>