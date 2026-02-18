<template>
  <div class="login-wrapper">
    <div class="login-card">
      <div v-if="auth.step === 'login'">
        <h2>Bejelentkezés</h2>
        <div class="input-group">
          <input v-model="form.email" type="email" placeholder="Email" @keyup.enter="handleLogin">
          <input v-model="form.password" type="password" placeholder="Jelszó" @keyup.enter="handleLogin">
        </div>
        <button :disabled="loading" @click="handleLogin">
          {{ loading ? 'Folyamatban...' : 'Kód küldése' }}
        </button>
      </div>

      <div v-else-if="auth.step === '2fa'">
        <h2>Biztonsági ellenőrzés</h2>
        <p>A kód elküldve a megadott e-mail címre.</p>
        
        <div class="timer" :class="{ 'timer-low': timeLeft < 10 }">
          Hátralévő idő: {{ timeLeft }} másodperc
        </div>

        <div class="input-group">
          <input 
            v-model="twoFactorCode" 
            type="text" 
            maxlength="6" 
            placeholder="6 jegyű kód"
            @keyup.enter="handleVerify"
          >
        </div>
        <button :disabled="loading || timeLeft === 0" @click="handleVerify">
          {{ loading ? 'Ellenőrzés...' : 'Belépés' }}
        </button>
        <button class="btn-link" @click="resetLogin">Vissza a bejelentkezéshez</button>
      </div>

      <p v-if="auth.errorMessage" class="error-msg">{{ auth.errorMessage }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onUnmounted } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { useRouter } from 'vue-router'

const auth = useAuthStore()
const router = useRouter()

const form = reactive({ email: '', password: '' })
const twoFactorCode = ref('')
const loading = ref(false)
const timeLeft = ref(60)
let timerInterval = null

// Időzítő indítása
const startTimer = () => {
  timeLeft.value = 60
  if (timerInterval) clearInterval(timerInterval)
  timerInterval = setInterval(() => {
    if (timeLeft.value > 0) {
      timeLeft.value--
    } else {
      clearInterval(timerInterval)
      auth.errorMessage = "A kód lejárt, kérj újat!"
    }
  }, 1000)
}

const handleLogin = async () => {
  if (!form.email || !form.password) return
  loading.value = true
  await auth.login(form)
  loading.value = false
  
  if (auth.step === '2fa') {
    startTimer()
  }
}

const handleVerify = async () => {
  if (twoFactorCode.value.length < 6) return
  loading.value = true
  const success = await auth.verifyOtp(twoFactorCode.value)
  loading.value = false
  
  if (success) {
    clearInterval(timerInterval)
    router.push('/dashboard') // Vagy ahova küldeni akarod a sikeres belépés után
  }
}

const resetLogin = () => {
  clearInterval(timerInterval)
  auth.step = 'login'
  auth.errorMessage = null
}

onUnmounted(() => clearInterval(timerInterval))
</script>

<style scoped>
.login-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
}
.login-card {
  background: #f9f9f9;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  width: 100%;
  max-width: 400px;
  text-align: center;
}
.input-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-bottom: 1.5rem;
}
input {
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 4px;
}
button {
  width: 100%;
  padding: 12px;
  background-color: #42b883;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}
button:disabled {
  background-color: #a8d5c2;
}
.timer {
  margin: 10px 0;
  font-weight: bold;
  color: #666;
}
.timer-low {
  color: #e74c3c;
}
.error-msg {
  color: #e74c3c;
  margin-top: 1rem;
  font-size: 0.9rem;
}
.btn-link {
  background: none;
  color: #666;
  margin-top: 10px;
  font-size: 0.8rem;
  text-decoration: underline;
}
</style>