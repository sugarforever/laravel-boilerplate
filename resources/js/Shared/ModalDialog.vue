<script setup>
import { ref } from "vue"

const props = defineProps({
  display: {
    type: Boolean,
    default: false,
  },
})

const displayData = ref(props.display)

function hideDialog() {
  displayData.value = false
}
</script>
<template>
  <div @click="hideDialog" :class="`absolute inset-0 bg-blue-100/75 flex items-center justify-center z-10 ${displayData ? '' : 'hidden'}`">
    <div @click="(event) => event.stopPropagation()">
      <slot />
    </div>
  </div>
</template>
