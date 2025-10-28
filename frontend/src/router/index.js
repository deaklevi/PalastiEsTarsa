import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'

export const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes
})

// 🔥 Dinamikus meta title + description kezelés
router.beforeEach((to, from, next) => {
  const defaultTitle = 'Palásti és Társa Kft.'
  const defaultDescription = 'Palásti és Társa Kft. hivatalos weboldala –' // Ezt itt még ki kell tölteni!

  // Title
  document.title = to.meta?.title || defaultTitle

  // Description meta
  const desc = to.meta?.description || defaultDescription
  let descTag = document.querySelector('meta[name="description"]')

  if (!descTag) {
    descTag = document.createElement('meta')
    descTag.setAttribute('name', 'description')
    document.head.appendChild(descTag)
  }
  descTag.setAttribute('content', desc)

  next()
})