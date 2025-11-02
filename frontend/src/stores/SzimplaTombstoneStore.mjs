import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useSzimplaTombstone = defineStore('szimplaTombstone', {
  state: () => ({
    szimplaTombstones: [],
  }),

  actions: {
    async getSzimplaTombstones() {
      try {
        const { data } = await http.get('/szimpla_tombstones')
        this.szimplaTombstones = data.data
      } catch (error) {
        console.error('getSzimplaTombstones error:', error)
        throw error
      }
    },

    async getSzimplaTombstone(id) {
      try {
        const { data } = await http.get(`/szimpla_tombstones/${id}`)
        return data.data
      } catch (error) {
        console.error(`getSzimplaTombstone(${id}) error:`, error)
        throw error
      }
    },

    async createSzimplaTombstone(payload) {
      try {
        const formData = new FormData()

        for (const key in payload) {
          formData.append(key, payload[key])
        }

        const { data } = await http.post('/szimpla_tombstones', formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        })

        this.szimplaTombstones.push(data.data)
        return data.data
      } catch (error) {
        console.error('createSzimplaTombstone error:', error)
        throw error
      }
    },

    async updateSzimplaTombstone(id, payload) {
      try {
        const formData = new FormData()

        for (const key in payload) {
          formData.append(key, payload[key])
        }

        formData.append('_method', 'PUT') // ha Laravel formdata PUT-ot vár

        const { data } = await http.post(`/szimpla_tombstones/${id}`, formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        })

        const index = this.szimplaTombstones.findIndex(x => x.id === id)
        if (index !== -1) this.szimplaTombstones.splice(index, 1, data.data)

        return data.data
      } catch (error) {
        console.error(`updateSzimplaTombstone(${id}) error:`, error)
        throw error
      }
    },

    async deleteSzimplaTombstone(id) {
      try {
        await http.delete(`/szimpla_tombstones/${id}`)
        const index = this.szimplaTombstones.findIndex(x => x.id === id)
        if (index !== -1) this.szimplaTombstones.splice(index, 1)
      } catch (error) {
        console.error(`deleteSzimplaTombstone(${id}) error:`, error)
        throw error
      }
    },
  },
})
