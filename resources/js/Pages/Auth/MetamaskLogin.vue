<template>
  <Head title="Login with Metamask" />
  <div class="flex items-center justify-center p-6 min-h-screen">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="login">
        <div class="px-10 py-12">
          <h1 class="text-center text-3xl font-bold">Logic with Metamask</h1>
        </div>
        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
          <loading-button class="btn-fuchsia px-4 py-2 mx-auto" type="submit">Connect Wallet</loading-button>
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
  layout: Layout,

  methods: {
    async login() {
      if (!window.ethereum) {
        console.error('Metamask not exist');
        return;
      }

      const web3 = new Web3(window.ethereum);

      const { signatureUrl, authenticateUrl, redirectUrl } = await this.metamask

      const message = (await axios.get(signatureUrl)).data;
      const [address] = await web3.eth.requestAccounts();

      const signature = await web3.eth.personal.sign(message, address);

      try {
        const { status } = await axios.post(authenticateUrl, {
          'address': address,
          'signature': signature,
        });
        if (status == 200) {
          window.location = redirectUrl;
        }
      } catch (e) {
        console.error(e);
      }
    }
  }
}
</script>

<script setup>
const props = defineProps({
  metamask: Object,
  app: Object
})
</script>

