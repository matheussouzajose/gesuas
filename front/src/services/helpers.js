export default function getErrors (response) {
  let errors = null

  if (!response.data) {
    errors = {
      status: response?.request?.status,
      statusText: response?.request?.statusText,
      data: response?.response?.data
    }
  }
  return errors
}
