<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon.vue'
import Logo from '@/Shared/Logo.vue'
import Dropdown from '@/Shared/Dropdown.vue'
import MainMenu from '@/Shared/MainMenu.vue'
import FlashMessages from '@/Shared/FlashMessages.vue'

const props = defineProps({
  auth: Object,
  app: Object
})
</script>

<template>
  <div>
    <div id="dropdown" />
    <div class="md:flex md:flex-col">
      <div class="md:flex md:flex-col md:h-screen">
        <div class="flex flex-row md:flex-shrink-0">
          <div class="flex items-center justify-between px-4 py-4 border-b border-b-fuchsia-600 md:flex-shrink-0 md:justify-center md:w-56">
            <dropdown class="mr-2 md:hidden" placement="bottom-end">
              <template #default>
                <svg class="w-6 h-6 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
              </template>
              <template #dropdown>
                <div class="mt-2 px-8 py-4 bg-white rounded shadow-lg">
                  <main-menu class="space-y-4"/>
                </div>
              </template>
            </dropdown>
            <Link href="/">
              <logo :label-text="app.name" />
            </Link>
          </div>
          <div class="md:text-md flex flex-1 items-center md:justify-between justify-end p-4 text-sm bg-white border-b border-b-fuchsia-600 md:px-12 md:py-0">
            <div class="mr-4 mt-1"></div>
            <dropdown class="mt-1" placement="bottom-end">
              <template #default>
                <div class="group flex items-center cursor-pointer select-none">
                  <div class="mr-1 text-gray-700 group-hover:text-fuchsia-600 focus:text-fuchsia-600 whitespace-nowrap">
                    <span>{{ auth.user?.name }}</span>
                  </div>
                  <icon class="w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600"
                    name="cheveron-down" />
                </div>
              </template>
              <template #dropdown>
                <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                  <!--Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500"
                    :href="`/users/${auth.user.id}/edit`">My Profile</Link-->
                  <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-fuchsia-600" href="/logout"
                    method="delete" as="button">Logout</Link>
                </div>
              </template>
            </dropdown>
          </div>
        </div>
        <div class="md:flex md:flex-grow md:overflow-hidden">
          <main-menu class="hidden flex-shrink-0 p-12 w-56 bg-gray-100 overflow-y-auto md:block" />
          <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto" scroll-region>
            <flash-messages />
            <slot />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
