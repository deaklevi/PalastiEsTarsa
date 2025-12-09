// frontend/src/stores/contactStore.js
import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useContactStore = defineStore('contact', {
  state: () => ({
    loading: false,
    success: false,
    error: null
  }),
  actions: {
    async sendContact(data) {
      this.loading = true
      this.success = false
      this.error = null

      try {
        const response = await http.post('/send-contact', data)
        this.success = true
        return response.data
      } catch (err) {
        this.error = err.response?.data?.error || err.message
        throw err
      } finally {
        this.loading = false
      }
    }
  }
})
