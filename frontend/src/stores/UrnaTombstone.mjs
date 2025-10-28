import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'
import { onUpdated } from 'vue'

export const useUrnaTombstone = defineStore('urnatombstone', {
    state() {
        return {
            urnaTombstone: []
        }
    },
    actions: {
        async getUrnaTombstones(){
            const response = await http.get('/urna_tombstones')
            this.urnaTombstone = response.data.data
        },
        async getUrnaTombstone(id) {
            const response = await http.get(`/urna_tombstones/${id}`)
            return response.data.data
        },
        async createUrnaTombstone(data) {
            const response = await http.post('/urna_tombstones', data)
            this.urnaTombstone.push(response.data.data)
        },
        async updateUrnaTombstone(id, data) {
            const response = await http.put(`/urna_tombstones/${id}`, data)
            const findindex = this.urnaTombstone.findIndex(x=>x.id === id)
            this.urnaTombstone.splice(findindex,1,response.data.data)
        },
        async deleteUrnaTombstone(id) {
            const response = await http.delete(`/urna_tombstones/${id}`)
            const findindex = this.urnaTombstone.findIndex(x=>x.id === id)
            this.urnaTombstone.splice(findindex,1)
        }
    }
})