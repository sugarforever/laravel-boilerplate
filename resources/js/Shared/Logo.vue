<script setup>
const props = defineProps({
  labelText: String
})
</script>

<template>
  <div class="text-white text-lg font-bold">
    {{ labelText }}
  </div>
</template>
