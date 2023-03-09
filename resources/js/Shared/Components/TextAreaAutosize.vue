<script setup>
import { onBeforeUnmount, onMounted, ref } from "vue";
import autosize from "autosize/dist/autosize";

const props = defineProps({
  modelValue: String
});
const emit = defineEmits(['update:modelValue']);

const el = ref();

onMounted(() => autosize(el.value));
onBeforeUnmount(() => autosize.destroy(el.value));
</script>

<template>
  <textarea ref="el" @input="emit('update:modelValue', $event.target.value)" v-model="props.modelValue" />
</template>
