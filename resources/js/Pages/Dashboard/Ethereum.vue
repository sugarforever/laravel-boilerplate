<template>
    <div>{{ eth_address }}</div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout.vue'
import { Inertia } from '@inertiajs/inertia'
export default {
    components: {
        Head,
    },
    props: {
        eth_address: String
    },
    layout: Layout,
}
</script>
