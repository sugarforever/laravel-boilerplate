<template>
    <div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/">
            <icon name="dashboard" class="mr-2 w-4 h-4"
                :class="isUrl('dashboard') ? 'fill-gray-600' : 'fill-black group-hover:fill-gray-600'" />
            <div :class="isUrl('dashboard') ? 'text-gray-600' : 'text-black group-hover:text-gray-600'">Dashboard</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/organizations">
            <icon name="office" class="mr-2 w-4 h-4"
                :class="isUrl('organizations') ? 'fill-gray-600' : 'fill-black group-hover:fill-gray-600'" />
            <div :class="isUrl('organizations') ? 'text-gray-600' : 'text-black group-hover:text-gray-600'">Organizations
            </div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/contacts">
            <icon name="users" class="mr-2 w-4 h-4"
                :class="isUrl('contacts') ? 'fill-gray-600' : 'fill-black group-hover:fill-gray-600'" />
            <div :class="isUrl('contacts') ? 'text-gray-600' : 'text-black group-hover:text-gray-600'">Contacts</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/reports">
            <icon name="printer" class="mr-2 w-4 h-4"
                :class="isUrl('reports') ? 'fill-gray-600' : 'fill-black group-hover:fill-gray-600'" />
            <div :class="isUrl('reports') ? 'text-gray-600' : 'text-black group-hover:text-gray-600'">Reports</div>
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon.vue'
import { usePage } from '@inertiajs/inertia-vue3'

function isUrl(...urls) {
    let currentUrl = usePage().url.value.substr(1)
    if (urls[0] === '') {
        return currentUrl === ''
    }
    return urls.filter((url) => currentUrl.startsWith(url)).length
}
</script>
