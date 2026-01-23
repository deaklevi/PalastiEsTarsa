import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite'
import Vue from '@vitejs/plugin-vue'
import VueRouter from 'unplugin-vue-router/vite'
import path from 'path'
import fs from 'fs-extra'

export default defineConfig({
  base: './', // relatív útvonal
  plugins: [
    VueRouter({
      routesFolder: 'src/pages',
      extensions: ['.vue'],
      dts: 'src/typed-router.d.ts'
    }),
    Vue(),

    // public fájlok másolása a régi build logika szerint, sitemap külön kezelve
    {
      name: 'copy-public',
      closeBundle() {
        const distPublic = path.resolve(__dirname, 'dist/public')

        // public mappa másolása a dist/public alá
        fs.copySync('public', distPublic, {
          filter: (src) => !src.endsWith('sitemap.xml')
        })

        // sitemap.xml átmásolása a dist gyökerébe
        const sitemapSrc = path.resolve(__dirname, 'public/sitemap.xml')
        const sitemapDest = path.resolve(__dirname, 'dist/sitemap.xml')
        if (fs.existsSync(sitemapSrc)) {
          fs.copyFileSync(sitemapSrc, sitemapDest)
          console.log('✅ sitemap.xml copied to dist/')
        }
      }
    }
  ],
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
  server: {
    host: true
  },
  build: {
    outDir: path.resolve(__dirname, 'dist'),
    emptyOutDir: true,
    assetsDir: '', 
    rollupOptions: {
      output: {
        entryFileNames: `[name]-[hash].js`,
        chunkFileNames: `[name]-[hash].js`,
        assetFileNames: `[name]-[hash].[ext]`
      }
    }
  }
})
