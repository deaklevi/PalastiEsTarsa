import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite'

import Vue from '@vitejs/plugin-vue'
import VueRouter from 'unplugin-vue-router/vite'
import path from 'path'

export default defineConfig({
  base: '/assets/',   // 🔴 EZ HIÁNYZOTT
  plugins: [
    VueRouter({
      routesFolder: 'src/pages', 
      extensions: ['.vue'],      
      dts: 'src/typed-router.d.ts'
    }),
    Vue()
  ],
  server: {
    host: true,
  },
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
      '@assets': fileURLToPath(new URL('./src/assets', import.meta.url)),
      '@components': fileURLToPath(new URL('./src/components', import.meta.url)),
      '@layouts': fileURLToPath(new URL('./src/layouts', import.meta.url)),
      '@locales': fileURLToPath(new URL('./src/locales', import.meta.url)),
      '@pages': fileURLToPath(new URL('./src/pages', import.meta.url)),
      '@stores': fileURLToPath(new URL('./src/stores', import.meta.url)),
      '@utils': fileURLToPath(new URL('./src/utils', import.meta.url))
    }
  },
  build: {
  outDir: path.resolve(__dirname, '../backend/public/assets'),
  emptyOutDir: false,
  assetsDir: '',  
  rollupOptions: {
    output: {
      entryFileNames: `[name]-[hash].js`,
      chunkFileNames: `[name]-[hash].js`,
      assetFileNames: `[name]-[hash].[ext]`  // ez a sor biztosítja, hogy ne menjenek nested mappába
    }
  }
}


})
