import axios from "axios"

export const http = axios.create({
  baseURL: "http://192.168.1.83:8000/api",
  headers: {
    "Accept": "application/json",
    "Content-Type": "application/json"
  }
})
