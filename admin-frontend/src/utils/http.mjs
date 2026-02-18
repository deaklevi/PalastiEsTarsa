import axios from 'axios'
import { useAuthStore } from '@/stores/auth'
import { router } from '@/router' // Fontos, hogy beimportáld a routert!

export const http = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL + "/api",
    headers: { "Accept": "application/json" }
})

// Request: Token csatolása
http.interceptors.request.use(config => {
    const token = localStorage.getItem('token')
    if (token) config.headers.Authorization = `Bearer ${token}`
    return config
})

// Response: Ha a szerver azt mondja "Hoppá, nincs jogod", akkor irány a login
http.interceptors.response.use(
    response => response,
    error => {
        if (error.response && error.response.status === 401) {
            const auth = useAuthStore()
            auth.logout() // Törli az állapotot
            router.push('/login')
        }
        return Promise.reject(error)
    }
)