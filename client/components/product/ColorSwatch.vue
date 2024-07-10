<script setup lang="ts">
interface Color {
    name: string;
    hex: string;
}

interface Props {
    color: Color;
}

defineProps<Props>();
</script>

<template>
    <div class="flex items-center gap-3">
        <span
            class="h-6 w-6 rounded-full shrink-0"
            :style="`background-color: ${color.hex}`"
        >
        </span>
        <span class="text-c-gray font-medium">
            {{ color.name }}
        </span>
    </div>
</template>
