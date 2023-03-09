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
  <textarea ref="el"
    class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
    @input="emit('update:modelValue', $event.target.value)">{{ props.modelValue }}</textarea>
</template>
