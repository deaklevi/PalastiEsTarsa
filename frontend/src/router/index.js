// src/router/index.js
import { createRouter, createWebHashHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'

export const router = createRouter({
  history: createWebHashHistory(), // hash mode
  linkActiveClass: 'active',
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) return savedPosition
    else if (to.hash) return { el: to.hash }
    else return { top: 0 }
  }
})

// 🔥 Dinamikus meta title + description
router.beforeEach((to, from, next) => {
  const defaultTitle = 'Palásti és Társa Kft.'
  const defaultDescription =
    'A Kő – legyen az gránit, márvány vagy mészkő – az életünk! A kőfeldolgozás valamennyi területén megálljuk a helyünket. 1954 óta rengeteg tapasztalatot gyűjtöttünk az egyedi kézműves síremlékek, kripták, emlékművek, szökőkutak és minden egyéb épülethez tartozó kőburkolat, kőtermék készítésében, kerüljön az kültérre vagy beltérre.'

  // Title
  document.title = to.meta?.title || defaultTitle

  // Description meta
  let descTag = document.querySelector('meta[name="description"]')
  if (!descTag) {
    descTag = document.createElement('meta')
    descTag.setAttribute('name', 'description')
    document.head.appendChild(descTag)
  }
  descTag.setAttribute('content', to.meta?.description || defaultDescription)

  next()
})
