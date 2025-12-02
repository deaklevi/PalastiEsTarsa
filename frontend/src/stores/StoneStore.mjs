import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useStone = defineStore('stone', {
  state: () => ({
    stones: [],
  }),

  actions: {
    async getStones() {
      try {
        const { data } = await http.get('/stones')
        this.stones = data.data
      } catch (error) {
        console.error('getStones error:', error)
        throw error
      }
    },

    async getStone(id) {
      try {
        const { data } = await http.get(`/stones/${id}`)
        return data.data
      } catch (error) {
        console.error(`getStone(${id}) error:`, error)
        throw error
      }
    },

    async createStone(payload) {
      try {
        const formData = new FormData()

        for (const key in payload) {
          formData.append(key, payload[key])
        }

        const { data } = await http.post('/stones', formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        })

        this.stones.push(data.data)
        return data.data
      } catch (error) {
        console.error('createStone error:', error)
        throw error
      }
    },

    async updateStone(id, payload) {
      try {
        let data

        if (payload.image) {
          // ha van új kép → FormData
          const formData = new FormData()
          for (const key in payload) formData.append(key, payload[key])
          formData.append('_method', 'PUT')

          const response = await http.post(`/stones/${id}`, formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
          })
          data = response.data
        } else {
          // ha nincs új kép → sima JSON PUT
          const response = await http.put(`/stones/${id}`, payload)
          data = response.data
        }

        const index = this.stones.findIndex(x => x.id === id)
        if (index !== -1) this.stones.splice(index, 1, data.data)

        return data.data
      } catch (error) {
        console.error(`updateStone(${id}) error:`, error)
        throw error
      }
    },

    async deleteStone(id) {
      try {
        await http.delete(`/stones/${id}`)
        const index = this.stones.findIndex(x => x.id === id)
        if (index !== -1) this.stones.splice(index, 1)
      } catch (error) {
        console.error(`deleteStone(${id}) error:`, error)
        throw error
      }
    },
  },
})
