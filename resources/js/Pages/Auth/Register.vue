<template>
  <Head title="Login" />
  <div class="flex items-center justify-center p-6 min-h-screen">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="register">
        <div class="px-10 py-12">
          <h1 class="text-center text-xl font-bold">Welcome to {{ app.name }}!</h1>
          <div class="mt-6 mx-auto w-24 border-b-2" />
          <text-input v-model="form.name" :error="form.errors.name" class="mt-10 flex flex-col" label="Name" type="text" autofocus autocapitalize="off" />
          <text-input v-model="form.email" :error="form.errors.email" class="mt-6 flex flex-col" label="Email" type="email" autofocus autocapitalize="off" />
          <text-input v-model="form.password" :error="form.errors.password" class="mt-6 flex flex-col" label="Password" type="password" />
          <text-input v-model="form.password_confirmation" :error="form.errors.confirmedPassword" class="mt-6 flex flex-col" label="Confirm Password" type="password" />
        </div>
        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-fuchsia px-4 py-2 ml-auto" type="submit">Register</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/GuestLayout.vue'
import Logo from '@/Shared/Logo.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'

export default {
  components: {
    Head,
    LoadingButton,
    Logo,
    TextInput,
  },
  props: {
    app: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }),
    }
  },
  layout: Layout,
  methods: {
    register() {
      this.form.post('/register')
    },
  },
}
</script>
