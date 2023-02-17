<template>
  <header class="header">
    <div class="header-group">
      <div class="flex items-center justify-between py-10">
        <div class="w-28 lg:w-20">
          <img class="w-full h-full" src="../../assets/images/mjose-white.png" alt="logo">
        </div>

        <div class="flex">
          <button
            id="header-create-account-button"
            @click="() => emit('create-account')"
            class="px-6 py-2 font-bold rounded-full text-white focus:outline-none"
          >
            Crie uma conta
          </button>
          <button
            id="header-list-account-button"
            @click="() => emit('list-account')"
            class="px-6 py-2 font-bold bg-white rounded-full text-brand-main focus:outline-none"
          >
            Buscar conta pelo NIS
          </button>
        </div>
      </div>

      <div class="flex flex-col mt-28">
        <h1 class="text-3xl font-black text-white">
          Tenha uma conta no GESUAS. <br>
          E gere o seu NIS <br class="hidden lg:inline-block">
          (Número de Identificação Social)
        </h1>
        <p class="text-lg font-medium text-white">
          Use o NIS para realizar o pagamento de benefícios sociais <br class="hidden lg:inline-block">
          emissão de documentos, dentre outras utilidades.
        </p>
        <div>
          <button
            @click="() => emit('create-account')"
            id="cta-create-account-button"
            class="px-6 py-2 mt-10 font-bold bg-white rounded-full text-brand-main focus:outline-none"
          >
            Crie sua conta
          </button>
        </div>
      </div>

    </div>
  </header>
</template>

<script>
export default {
  setup (_, { emit }) {
    return { emit }
  }
}
</script>

<style lang="postcss" scoped>
.header {
  @apply bg-brand-main w-full flex justify-center;
  height: 100%;
}

.header-group {
  @apply flex flex-col w-4/5 max-w-6xl;
}

@media (min-width: 640px) {
  .header-group {
    background-image: url(../../assets/images/mjose-white.png);
    background-size: 700px;
    background-position: 100% 130%;
    background-repeat: no-repeat;
  }
}
</style>
