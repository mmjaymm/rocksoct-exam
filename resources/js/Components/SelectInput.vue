<script setup lang="ts">
import { ref, defineProps, watch } from 'vue';

const props = defineProps<{
  id?: string;
  options: Array<{ value: string | number; text: string }>;
  modelValue?: string | number; // v-model value
  placeholder?: string;
}>();

const emit = defineEmits<{
  (e: 'update:modelValue', value: string | number): void;
}>();

const selectedValue = ref(props.modelValue);

watch(() => props.modelValue, (newValue) => {
  selectedValue.value = newValue;
});

const handleChange = (event: Event) => {
  const value = (event.target as HTMLSelectElement).value;
  selectedValue.value = value;
  // Emit the change event to update the parent
  emit('update:modelValue', value);
};
</script>
<template>
    <div class="relative">
      <select
        :id="id"
        v-model="selectedValue"
        class="block w-full mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
        @change="handleChange"
      >
        <option v-if="placeholder" disabled value="">{{ placeholder }}</option>
        <option v-for="option in options" :key="option.value" :value="option.value">
          {{ option.text }}
        </option>
      </select>
    </div>
  </template>