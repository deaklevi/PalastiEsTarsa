<template>
  <div class="dashboard">
    <header>
      <h1>Üdvözöllek a Palásti Kft. Admin felületén!</h1>
      <button @click="handleLogout">Kijelentkezés</button>
    </header>

    <main>
      <div class="stats-card">
        <h3>Sikeres belépés!</h3>
        <p>Itt tudod majd kezelni a sírköveket és egyéb adatokat.</p>
      </div>
    </main>
  </div>
</template>

<script setup>
import { useAuthStore } from '@/stores/auth'
import { useRouter } from 'vue-router'

const auth = useAuthStore()
const router = useRouter()

const handleLogout = () => {
  auth.logout() // Ez törli a tokent a localStorage-ból
  router.push('/login')
}
</script>

<router lang="json">
{
    "name": "Dashboard",
    "meta": { "requiresAuth": true }
}
</router>

<style scoped>
.dashboard { padding: 20px; }
header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
.stats-card { background: #e8f5e9; padding: 20px; border-radius: 8px; margin-top: 20px; }
button { background: #ff4d4d; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; }
</style>