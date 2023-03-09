<script setup>
import { onBeforeUnmount, onMounted, ref } from "vue";
import autosize from "autosize/dist/autosize";

const props = defineProps({
  modelValue: String
});
const emit = defineEmits(['update:modelValue']);

const el = ref();

watch(() => props.modelValue, (newValue, oldValue) => {
  if (oldValue != "" && newValue == "") {
    el.value.style.height = 'auto';
  }
});
onMounted(() => autosize(el.value));

onBeforeUnmount(() => autosize.destroy(el.value));
</script>

<template>
  <textarea ref="el"
    @input="emit('update:modelValue', $event.target.value)" v-model="props.modelValue"></textarea>
</template>
