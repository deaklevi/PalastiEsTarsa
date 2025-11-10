import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useAccessory = defineStore('accessory', {
  state: () => ({
    accessories: [],
  }),

  actions: {
    async getAccessories() {
      try {
        const { data } = await http.get('/accessories')
        this.accessories = data.data
      } catch (error) {
        console.error('getAccessories error:', error)
        throw error
      }
    },

    async getAccessory(id) {
      try {
        const { data } = await http.get(`/accessories/${id}`)
        return data.data
      } catch (error) {
        console.error(`getAccessory(${id}) error:`, error)
        throw error
      }
    },

    async createAccessory(payload) {
      try {
        const formData = new FormData()

        for (const key in payload) {
          formData.append(key, payload[key])
        }

        const { data } = await http.post('/accessories', formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        })

        this.accessories.push(data.data)
        return data.data
      } catch (error) {
        console.error('createAccessory error:', error)
        throw error
      }
    },

    async updateAccessory(id, payload) {
      try {
        let data

        if (payload.image) {
          // ha van új kép → FormData
          const formData = new FormData()
          for (const key in payload) formData.append(key, payload[key])
          formData.append('_method', 'PUT')

          const response = await http.post(`/accessories/${id}`, formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
          })
          data = response.data
        } else {
          // ha nincs új kép → sima JSON PUT
          const response = await http.put(`/accessories/${id}`, payload)
          data = response.data
        }

        const index = this.accessories.findIndex(x => x.id === id)
        if (index !== -1) this.accessories.splice(index, 1, data.data)

        return data.data
      } catch (error) {
        console.error(`updateAccessory(${id}) error:`, error)
        throw error
      }
    },

    async deleteAccessory(id) {
      try {
        await http.delete(`/accessories/${id}`)
        const index = this.accessories.findIndex(x => x.id === id)
        if (index !== -1) this.accessories.splice(index, 1)
      } catch (error) {
        console.error(`deleteAccessory(${id}) error:`, error)
        throw error
      }
    },
  },
})
