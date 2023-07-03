<script setup>
const props = defineProps({
  labelText: String
})
</script>

<template>
  <div class="text-lg font-bold">
    {{ labelText }}
  </div>
</template>
