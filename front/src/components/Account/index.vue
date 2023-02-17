<template>
  <div class="flex flex-col w-4/5 max-w-6xl animate__animated animate__pulse  animate__faster">
    <p class="text-lg text-gray-800 font-regular">
      Este aqui é o seu NIS
    </p>
    <div
      class="flex py-3 pl-5 mt-2 rounded justify-between items-center bg-brand-gray w-full"
    >
      <span>{{ account?.data?.document_id }}</span>
      <div class="flex ml-20 mr-5">
        <icon
          @click="handleCopy"
          name="copy"
          :color="brandColors.graydark"
          size="24"
          class="cursor-pointer"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Icon from '@/components/Icon'
import palette from '../../../palette'
import { useToast } from 'vue-toastification'
export default {
  name: 'index',
  props: {
    account: { type: [Object], required: true }
  },
  components: {
    Icon
  },
  setup (props) {
    const toast = useToast()

    const handleCopy = async () => {
      toast.clear()
      try {
        await navigator.clipboard.writeText(props.account?.data?.document_id)
        toast.success('Copiado!')
      } catch (error) {
        toast.success('Ocorreu um erro ao copiar!')
      }
    }

    return {
      data: props.account,
      brandColors: palette.brand,
      handleCopy
    }
  }
}
</script>

<style scoped>

</style>
