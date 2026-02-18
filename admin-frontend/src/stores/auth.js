import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs' // vagy ahol az axios-od van
import { useRouter } from 'vue-router'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    step: 'login', // 'login' vagy '2fa'
    errorMessage: null
  }),

  actions: {
    // 1. Lépés: Email + Jelszó
    async login(credentials) {
      try {
        this.errorMessage = null
        const response = await http.post('/login', credentials)
        
        // Elmentjük az ideiglenes tokent a 2FA-hoz
        localStorage.setItem('token', response.data.token)
        this.step = '2fa' 
      } catch (error) {
        this.errorMessage = "Hibás bejelentkezési adatok!"
      }
    },

    // 2. Lépés: 6 jegyű kód ellenőrzése
    async verifyOtp(code) {
      try {
        const response = await http.post('/verify-2fa', { code })
        
        // Frissítjük a tokent a véglegesre
        localStorage.setItem('token', response.data.token)
        this.user = response.data.data
        this.step = 'logged-in'
        
        // Átirányítás a védett oldalra
        return true
      } catch (error) {
        this.errorMessage = "Hibás vagy lejárt kód!"
        return false
      }
    },

    logout() {
      localStorage.removeItem('token')
      this.user = null
      this.step = 'login'
      window.location.href = '/login'
    }
  }
})