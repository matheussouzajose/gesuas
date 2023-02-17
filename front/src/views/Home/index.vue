<template>
  <custom-header
    @create-account="handleCreateAccount"
    @list-account="handleListAccount"
  />
  <div class="flex justify-center py-10 bg-brand-gray">
    <p class="font-medium text-center text-gray-800">M.S.JOSE © 2023</p>
  </div>
</template>

<script>
import CustomHeader from './CustomHeader.vue'
import useModal from '../../hooks/useModal'

export default {
  components: { CustomHeader },
  setup () {
    const modal = useModal()
    function handleListAccount () {
      modal.open({
        component: 'ModalListAccount'
      })
    }

    function handleCreateAccount () {
      modal.open({
        component: 'ModalCreateAccount'
      })
    }

    return {
      handleListAccount,
      handleCreateAccount
    }
  }
}
</script>
