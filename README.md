# 🧩 Webalkalmazás – Lokális fejlesztői környezet

Ez a dokumentum bemutatja, hogyan indíthatod el a projekt **backend** (Laravel) és **frontend** (Vue.js) részeit a saját gépeden.

Ezzel az indítással mobilon is tesztelhető lesz a webalkalmazás.

---

## 🚀 Backend indítása (Laravel)

1. Indítsd el a **XAMPP Control Panel**-t, majd nyisd meg a **PhpMyAdmin**-t.
2. Futtasd a seeder fájlokat és inicializáld az adatbázist:

   ```bash
   php artisan migrate:fresh --seed
   ```

3. Hozd létre a képekhez szükséges publikus linket:

    php artisan storage:link

4. Indítsd el a Laravel szervert:

    php artisan serve --host=0.0.0.0 --port=8000

## 🚀 Frontend indítása (Vue)

1. A frontend mappában futtasd a következő parancsot:

    npm run dev

## 🔗 Lokális URL-ek

| Szolgáltatás                 | URL                                                                    |
| ---------------------------  | ---------------------------------------------------------------------- |
| **PhpMyAdmin**               | [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)           |
| **Backend (Laravel)**        | [http://192.168.1.83:8000/](http://192.168.1.83:8000/)                 |
| **Backend API**              | `http://192.168.1.83:8000/api/` + *API útvonal*                        |
| **Backend képek (storage)**  | [http://192.168.1.83:8000/storage/](http://192.168.1.83:8000/storage/) |
| **Frontend (Vite / Vue)**    | [http://localhost:5173/](http://localhost:5173/)                       |
| ➜ Network                   | [http://26.15.56.125:5173/](http://26.15.56.125:5173/)                 |
| ➜ Network                   | [http://192.168.1.83:5173/](http://192.168.1.83:5173/)                 |
| ➜ Network                   | [http://192.168.56.1:5173/](http://192.168.56.1:5173/)                 |

## ⚡ Gyors indítás összefoglaló

1. Backend

    composer install
    copy .env.example .env (Beállítani az adatbázist MYSQL)
    php artisan key:generate
    php artisan storage:link
    php artisan config:clear
    php artisan config:cache
    php artisan migrate
    php artisan migrate:fresh --seed
    php artisan serve --host=0.0.0.0 --port=8000

2. Frontend

    npm install
    npm run dev

## 📦 Technológiák
    
    Backend: Laravel (PHP)
    Frontend: Vue.js + Vite
    Adatbázis: MySQL (PhpMyAdmin kezelőfelülettel)
    Fejlesztői környezet: XAMPP / Node.js

## ⚙️ Rendszerkövetelmények

| Komponens | Ajánlott verzió | Megjegyzés |
|------------|------------------|------------|
| **PHP** | 8.2+ | Laravel futtatásához szükséges |
| **Composer** | 2.x | PHP csomagkezelő |
| **Node.js** | 18.x vagy újabb | Vite / Vue buildhez |
| **npm** | 9.x vagy újabb | Node csomagkezelő |
| **MySQL** | 8.x | Adatbázis |
| **XAMPP** | 8.x | Apache + MySQL lokális környezethez |
| **Git** | legfrissebb | Verziókezeléshez |