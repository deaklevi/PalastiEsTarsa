import fs from 'fs'
import path from 'path'

// 🔴 ÁLLÍTSD BE
const DOMAIN = 'https://example.hu'

// ide build után már generált TS file
const ROUTES_FILE = 'src/typed-router.d.ts'

// egyszerű regex a pathokra
const routeRegex = /RouteRecordInfo<[^,]+,\s*'([^']+)'/g

const file = fs.readFileSync(ROUTES_FILE, 'utf8')

const urls = new Set()
let match

while ((match = routeRegex.exec(file)) !== null) {
  const routePath = match[1]

  // kizárások (ha kellenek)
  if (routePath.includes(':')) continue
  if (routePath.startsWith('/admin')) continue

  urls.add(routePath)
}

const today = new Date().toISOString().split('T')[0]

const xml = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${[...urls]
  .sort()
  .map(
    (url) => `
  <url>
    <loc>${DOMAIN}${url}</loc>
    <lastmod>${today}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>${url === '/' ? '1.0' : '0.8'}</priority>
  </url>
`
  )
  .join('')}
</urlset>
`

fs.writeFileSync('public/sitemap.xml', xml.trim())

console.log(`✅ sitemap.xml generálva (${urls.size} URL)`)
