import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useArchitecture = defineStore('architecture', {
  state: () => ({
    architectures: [],
  }),

  actions: {
    async getArchitectures() {
      try {
        const { data } = await http.get('/architectures')
        this.architectures = data.data
      } catch (error) {
        console.error('getArchitectures error:', error)
        throw error
      }
    },

    async getArchitecture(id) {
      try {
        const { data } = await http.get(`/architectures/${id}`)
        return data.data
      } catch (error) {
        console.error(`getArchitecture(${id}) error:`, error)
        throw error
      }
    },

    async createArchitecture(payload) {
      try {
        const formData = new FormData()

        for (const key in payload) {
          formData.append(key, payload[key])
        }

        const { data } = await http.post('/architectures', formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        })

        this.architectures.push(data.data)
        return data.data
      } catch (error) {
        console.error('createArchitecture error:', error)
        throw error
      }
    },

    async updateArchitecture(id, payload) {
      try {
        let data

        if (payload.image) {
          // ha van új kép → FormData
          const formData = new FormData()
          for (const key in payload) formData.append(key, payload[key])
          formData.append('_method', 'PUT')

          const response = await http.post(`/architectures/${id}`, formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
          })
          data = response.data
        } else {
          // ha nincs új kép → sima JSON PUT
          const response = await http.put(`/architectures/${id}`, payload)
          data = response.data
        }

        const index = this.architectures.findIndex(x => x.id === id)
        if (index !== -1) this.architectures.splice(index, 1, data.data)

        return data.data
      } catch (error) {
        console.error(`updateArchitecture(${id}) error:`, error)
        throw error
      }
    },

    async deleteArchitecture(id) {
      try {
        await http.delete(`/architectures/${id}`)
        const index = this.architectures.findIndex(x => x.id === id)
        if (index !== -1) this.architectures.splice(index, 1)
      } catch (error) {
        console.error(`deleteArchitecture(${id}) error:`, error)
        throw error
      }
    },
  },
})
