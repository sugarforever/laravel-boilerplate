<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
  auth: Object,
  app: Object,
  metamask: Object
})
</script>

<template>
  <div class="flex flex-col bg-fuchsia-100 dark:bg-fuchsia-800">
    <slot />

    <div class="fixed top-0 right-0 px-6 py-4 sm:block">
      <a :href="`/`" class="mr-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ app.name }}</a>
      <a v-if="auth?.user" :href="`/dashboard`" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
      <Link v-if="auth?.user" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" href="/logout"
        method="delete" as="button">Logout</Link>
      <a v-if="!auth?.user" :href="`/login`" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
      <a v-if="!auth?.user && metamask.enabled" :href="`metamask-login`" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Log
        in
        with MetaMask</a>
      <a v-if="!auth?.user" :href="`/register`"
        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
    </div>
  </div>
</template>
