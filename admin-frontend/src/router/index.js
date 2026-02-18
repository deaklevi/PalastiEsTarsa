import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'
import { useAuthStore } from '@/stores/auth'

export const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  
  // Megnézzük, hogy az adott út (vagy bármely szülője) igényel-e hitelesítést
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth)

  if (requiresAuth) {
    if (!token) {
      // Ha nincs token, azonnal küldjük a loginra
      return next({ name: 'Login' })
    }
    
    // Itt hívjuk meg a store-t, hogy ellenőrizzük a 2FA állapotot is
    const auth = useAuthStore()
    if (auth.step !== 'logged-in') {
      return next({ name: 'Login' })
    }
  }
  
  // Ha nem kell auth, vagy minden oké, mehet tovább
  next()
})