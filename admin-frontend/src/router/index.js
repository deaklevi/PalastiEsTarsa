import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'

export const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  
  // Ha nem a login oldalon vagyunk és nincs token, dobjuk ki
  if (to.path !== '/login' && !token) {
    next('/login');
  } else {
    next();
  }
});