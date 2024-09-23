<script setup lang="ts">

defineProps<{
    color: string;
    text: string
}>();

</script>

<template>
    <span 
        :class="[
        `bg-${color}-100`,
        `text-${color}-800`,
        `border-${color}-400`,
        'text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 border',
        `dark:text-${color}-400`
        ]"
    >
        {{ text  }}
    </span>
</template>