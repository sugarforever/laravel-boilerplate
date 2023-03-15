<template>
  <Head :title="`Welcome to ${app.name}`" />
  <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
    <div class="flex items-center max-w-6xl mx-auto sm:px-6 lg:px-8">
      <span class="text-fuchsia-900 text-4xl md:text-6xl font-bold">{{ app.name }}</span>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    Head,
  },
  layout: Layout,
}
</script >

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/GuestLayout.vue'

const props = defineProps({
  app: Object,
  auth: Object
})
</script>
