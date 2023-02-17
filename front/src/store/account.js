import { reactive } from 'vue'

const state = reactive({
  data: {}
})

export default state

export function cleanAccount () {
  state.data = {}
}
export function setAccount (user) {
  state.data = user
}
