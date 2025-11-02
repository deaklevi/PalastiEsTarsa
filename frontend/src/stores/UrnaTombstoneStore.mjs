import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useUrnaTombstone = defineStore('urnaTombstone', {
  state: () => ({
    urnaTombstones: []
  }),

  actions: {
    async getUrnaTombstones() {
      try {
        const { data } = await http.get('/urna_tombstones')
        this.urnaTombstones = data.data
      } catch (error) {
        console.error('getUrnaTombstones error:', error)
        throw error
      }
    },

    async getUrnaTombstone(id) {
      try {
        const { data } = await http.get(`/urna_tombstones/${id}`)
        return data.data
      } catch (error) {
        console.error(`getUrnaTombstone(${id}) error:`, error)
        throw error
      }
    },

    async createUrnaTombstone(payload) {
      try {
        const formData = new FormData()
        for (const key in payload) {
          formData.append(key, payload[key])
        }

        const { data } = await http.post('/urna_tombstones', formData, {
          headers: { 'Content-Type': 'multipart/form-data' }
        })

        this.urnaTombstones.push(data.data)
        return data.data
      } catch (error) {
        console.error('createUrnaTombstone error:', error)
        throw error
      }
    },

    async updateUrnaTombstone(id, payload) {
      try {
        const formData = new FormData()
        for (const key in payload) {
          formData.append(key, payload[key])
        }

        // Laravel PUT formData esetén
        formData.append('_method', 'PUT')

        const { data } = await http.post(`/urna_tombstones/${id}`, formData, {
          headers: { 'Content-Type': 'multipart/form-data' }
        })

        const index = this.urnaTombstones.findIndex(x => x.id === id)
        if (index !== -1) this.urnaTombstones.splice(index, 1, data.data)
        return data.data
      } catch (error) {
        console.error(`updateUrnaTombstone(${id}) error:`, error)
        throw error
      }
    },

    async deleteUrnaTombstone(id) {
      try {
        await http.delete(`/urna_tombstones/${id}`)
        const index = this.urnaTombstones.findIndex(x => x.id === id)
        if (index !== -1) this.urnaTombstones.splice(index, 1)
      } catch (error) {
        console.error(`deleteUrnaTombstone(${id}) error:`, error)
        throw error
      }
    }
  }
})
