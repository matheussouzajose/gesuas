<template>
  <div class="flex justify-between" id="modal-login">
    <h1 class="text-4xl font-black text-gray-800">
      {{ account?.data?.name ?? 'Buscar uma conta' }}
    </h1>

    <button
      @click="close"
      class="text-4xl text-gray-600 focus:outline-none"
    >
      &times;
    </button>
  </div>

  <div class="mt-8">
    <Form v-if="!account?.data?.name" @submit="handleSubmit" :validation-schema="schema" v-slot="{ errors }">
      <div class="mb-5">
        <label for="documentId" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">NIS (Número de Identificação Social)</label>
        <Field type="text" maxLength="11" name="documentId" id="documentId" placeholder="Digite seu NIS"
               class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-1 focus:outline-none  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               :class="[
                 {'border-red-300 focus:ring-red-500': errors.email},
                 {'focus:ring-primary-500': !errors.email}
               ]"/>
        <div class="text-red-500 text-sm mb-1">{{ errors.documentId }}</div>
      </div>
      <button
        id="submit-button"
        :disabled="store.Global.isLoading"
        type="submit"
        :class="{
          'opacity-50': store.Global.isLoading
        }"
        class="px-8 py-1 mt-3 text-2xl font-bold text-white rounded-full bg-brand-main focus:outline-none transition-all duration-150"
      >
        <icon v-if="store.Global.isLoading" name="loading" class="animate-spin"/>
        <span v-else>Buscar</span>
      </button>
    </Form>
    <account v-else :account="account" />
  </div>
</template>

<script>
import { Field, Form } from 'vee-validate'
import useModal from '@/hooks/useModal'
import { useToast } from 'vue-toastification'
import useStore from '@/hooks/useStore'
import * as Yup from 'yup'
import services from '@/services'
import Icon from '@/components/Icon'
import Account from '@/components/Account'
import { setAccount, cleanAccount } from '@/store/account'
import { computed, onMounted } from 'vue'
export default {
  components: { Icon, Form, Field, Account },
  setup () {
    const modal = useModal()
    const toast = useToast()
    const store = useStore()
    const schema = Yup.object().shape({
      documentId: Yup.string()
        .required('NIS é obrigatório.')
    })

    onMounted(() => {
      cleanAccount()
    })

    const account = computed(() => {
      return store.Account
    })
    const handleSubmit = async (values, { resetForm }) => {
      try {
        toast.clear()
        const { errors, data } = await services.account.getByDocumentId({ documentId: values.documentId })

        if (!errors) {
          setAccount(data.data)
          resetForm()
          return
        }

        if (errors.status === 404) {
          toast.error(errors?.data?.errors?.message)
        }

        if (errors.status === 422) {
          toast.error(errors?.data?.errors?.message)
        }
      } catch (error) {
        toast.error('Ocorreu um erro ao fazer a requisição')
      }
    }

    return {
      schema,
      store,
      account,
      close: modal.close,
      handleSubmit
    }
  }
}
</script>
