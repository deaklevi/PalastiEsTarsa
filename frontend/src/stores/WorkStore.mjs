import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useWork = defineStore('work', {
  state: () => ({
    works: [],
  }),

  actions: {
    async getWorks() {
      const res = await http.get('/works')
      this.works = res.data.data
    },

    async getWork(id) {
      const res = await http.get(`/works/${id}`)
      return res.data.data
    },

    async createWork(payload) {
      const res = await http.post('/works', payload)
      this.works.push(res.data.data)
      return res.data.data
    },

    async updateWork(id, payload) {
      const res = await http.put(`/works/${id}`, payload)
      const index = this.works.findIndex(w => w.id === id)
      if (index !== -1) this.works.splice(index, 1, res.data.data)
      return res.data.data
    },

    async deleteWork(id) {
      await http.delete(`/works/${id}`)
      const index = this.works.findIndex(w => w.id === id)
      if (index !== -1) this.works.splice(index, 1)
    },
  },
})
