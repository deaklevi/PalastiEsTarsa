import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'
import { useAuthStore } from '@/stores/auth' // <--- Ellenőrizd az elérési utat!

export const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes
})

router.beforeEach((to, from, next) => {
  // A store-t ITT, a függvényen belül kell példányosítani!
  const auth = useAuthStore()
  const token = localStorage.getItem('token')

  // Ha az oldalhoz hitelesítés kell (pl. Dashboard)
  if (to.name === 'Dashboard') {
    if (!token) {
      // Nincs token? Irány a login.
      return next({ name: 'Login' })
    } 
    if (auth.step !== 'logged-in') {
      // Van token, de a 2FA kód még nincs kész? Maradjon a login/2fa nézetben.
      // (Feltéve, hogy a Login oldalon kezeled a 2FA-t is)
      return next({ name: 'Login' })
    }
  }

  next()
})