<template>
  <div v-if="isValidated" class="dashboard">
    <header>
      <h1>Üdvözöllek a Palásti Kft. Admin felületén!</h1>
      <button class="logout-btn" @click="handleLogout">Kijelentkezés</button>
    </header>

    <main>
      <div class="stats-card">
        <h3>Sikeres belépés!</h3>
        <p>Itt tudod majd kezelni a sírköveket és egyéb adatokat.</p>
        <div class="admin-actions">
          <p>Állapot: <strong>Hitelesítve</strong></p>
        </div>
      </div>
    </main>
  </div>
  
  <div v-else class="loading-overlay">
    Ellenőrzés...
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { http } from '@utils/http.mjs' 
import { useRouter } from 'vue-router'

const router = useRouter()
const isValidated = ref(false)

onMounted(async () => {
  const token = localStorage.getItem('token')

  // 1. Azonnali check: Ha nincs token, nincs értelme várni a szerverre
  if (!token) {
    console.warn("Nincs token, irány a főoldal.")
    router.push('/')
    return
  }

  try {
    // 2. Szerver oldali validáció a védett útvonallal
    await http.get('/admin/protected-data')
    
    // Ha ide eljut a kód, a token érvényes
    isValidated.value = true
    console.log("Token érvényes, hozzáférés engedélyezve.")
  } catch (err) {
    // 3. Ha a szerver 401/403 hibát dob (lejárt vagy hamis token)
    console.error("Érvénytelen munkamenet!")
    localStorage.removeItem('token')
    router.push('/')
  }
})

// Kijelentkezés: törlés a tárolóból és irány a főoldal
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