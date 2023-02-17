import axios from 'axios'
import { setGlobalLoading } from '@/store/global'
import AccountService from './account'

const API_ENVS = {
  production: 'https://gesuas.vercel.app',
  development: '',
  local: 'http://localhost:8000/api/v1'
}

const httpClient = axios.create({
  baseURL: API_ENVS[process.env.NODE_ENV] || API_ENVS.local
})

httpClient.interceptors.request.use(config => {
  setGlobalLoading(true)
  return config
})

httpClient.interceptors.response.use((response) => {
  setGlobalLoading(false)
  return response
}, (error) => {
  const canThrowAnError = error?.request?.status === 0 ||
    error?.request?.status === 500

  if (canThrowAnError) {
    setGlobalLoading(false)
    throw new Error(error.message)
  }

  setGlobalLoading(false)
  return error
})

export default {
  account: AccountService(httpClient)
}
