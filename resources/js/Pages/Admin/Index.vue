<script setup>
const dateTimeFormat = new Intl.DateTimeFormat('en', { dateStyle: 'short', timeStyle: 'short', hour12: false })
const props = defineProps({
  users: Array
})
</script>
<template>
  <Head title="Home - Admin" />
  <div class="w-full">
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              {{ $t('app.admin.users_table.name_label') }}
            </th>
            <th scope="col" class="px-6 py-3">
              {{ $t('app.admin.users_table.email_label') }}
            </th>
            <th scope="col" class="px-6 py-3">
              {{ $t('app.admin.users_table.registered_at_label') }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ user.name }}
            </th>
            <td class="px-6 py-4">
              {{ user.email }}
            </td>
            <td class="px-6 py-4">
              {{ dateTimeFormat.format(new Date(user.created_at)) }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout.vue'
export default {
  components: {
    Head,
  },
  layout: Layout,
}
</script>
