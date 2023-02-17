import getErrors from './helpers'
export default httpClient => ({
  register: async ({ name }) => {
    const response = await httpClient.post('/accounts', { name })

    const errors = getErrors(response)

    return {
      data: response.data,
      errors
    }
  },
  getByDocumentId: async ({ documentId }) => {
    const response = await httpClient.get(`/accounts/${documentId}`)
    const errors = getErrors(response)

    return {
      data: response.data,
      errors
    }
  }
})
