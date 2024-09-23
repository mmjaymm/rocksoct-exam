<script setup lang="ts">

defineProps<{
    bgColor: string;
    text: string
}>();

</script>

<template>
    <span
        class="bg-red-100 text-red-400 border-red-400 text-xs font-medium me-2 px-2.5 py-0.5 rounded border" 
    >
        {{ text  }}
    </span>
</template>