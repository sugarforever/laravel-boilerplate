<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

const visiblePageCount = 4

const props = defineProps({
  pagination: Object
})

const visiblePages = computed(() => {
  const allPages = Array.from({ length: props.pagination.last_page }, (_, i) => i + 1)
  const currentPage = props.pagination.current_page

  if (allPages.length <= visiblePageCount) {
    return allPages
  }

  const left = currentPage - 1
  const right = currentPage + 1
  const isNearLeft = left <= 2
  const isNearRight = right >= allPages.length - 1

  if (isNearLeft) {
    return [...allPages.slice(0, visiblePageCount), '...', allPages.length]
  }

  if (isNearRight) {
    return [1, '...', ...allPages.slice(allPages.length - visiblePageCount)]
  }

  return [1, '...', currentPage - 1, currentPage, currentPage + 1, '...', allPages.length]
})
</script>

<template>
  <nav aria-label="paginator" v-if="pagination?.multiple_pages">
    <ul class="inline-flex items-center -space-x-px">
      <li>
        <a :href="pagination.prev_page_url"
          class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Previous</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </li>
      <li v-for="(page, index) in visiblePages" :key="index">
        <a v-if="page !== '...' && page !== pagination.current_page" :href="`${pagination.page_urls[page - 1]}`"
          class="block px-3 py-2 leading-tight text-blue-600 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
            page }}</a>
        <div v-if="page === '...' || page === pagination.current_page"
          class="px-3 py-2 leading-tight text-gray-600 bg-gray-100 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">{{
            page }}</div>
      </li>
      <li>
        <a :href="pagination.next_page_url"
          class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Next</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </li>
    </ul>
  </nav>
</template>
