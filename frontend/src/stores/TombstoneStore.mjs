import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useTombstone = defineStore('tombstone', {
  state: () => ({
    tombstones: [],
  }),

  actions: {
    async getTombstones() {
      try {
        const { data } = await http.get('/tombstones')
        this.tombstones = data.data
      } catch (error) {
        console.error('getTombstones error:', error)
        throw error
      }
    },

    async getTombstone(id) {
      try {
        const { data } = await http.get(`/tombstones/${id}`)
        return data.data
      } catch (error) {
        console.error(`getTombstone(${id}) error:`, error)
        throw error
      }
    },

    async createTombstone(payload) {
      try {
        const formData = new FormData()

        for (const key in payload) {
          formData.append(key, payload[key])
        }

        const { data } = await http.post('/tombstones', formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        })

        this.tombstones.push(data.data)
        return data.data
      } catch (error) {
        console.error('createTombstone error:', error)
        throw error
      }
    },

    async updateTombstone(id, payload) {
        try {
            let data

        if (payload.image) {
            // ha van új kép → FormData
            const formData = new FormData()
            for (const key in payload) formData.append(key, payload[key])
            formData.append('_method', 'PUT')
        
            const response = await http.post(`/tombstones/${id}`, formData, {
              headers: { 'Content-Type': 'multipart/form-data' },
        })
        data = response.data
        } else {
          // ha nincs új kép → sima JSON PUT
          const response = await http.put(`/tombstones/${id}`, payload)
          data = response.data
        }
    
        const index = this.tombstones.findIndex(x => x.id === id)
        if (index !== -1) this.tombstones.splice(index, 1, data.data)

        return data.data
        } catch (error) {
        console.error(`updateTombstone(${id}) error:`, error)
        throw error
      }
    },


    async deleteTombstone(id) {
      try {
        await http.delete(`/tombstones/${id}`)
        const index = this.tombstones.findIndex(x => x.id === id)
        if (index !== -1) this.tombstones.splice(index, 1)
      } catch (error) {
        console.error(`deleteTombstone(${id}) error:`, error)
        throw error
      }
    },
  },
})
