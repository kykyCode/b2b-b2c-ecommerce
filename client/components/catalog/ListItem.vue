<script setup lang="ts">
interface Props {
    text: string;
    isActive?: boolean;
}

defineProps<Props>();
</script>

<template>
    <button
        :class="[{ 'bg-white': isActive }]"
        class="hover:bg-c-almost-white flex items-center justify-between gap-6 px-6 py-2.5 transition-all w-full whitespace-nowrap"
    >
        <span class="text-c-black-txt font-medium text-lg">{{ text }}</span>
        <Icon class="text-c-gray" name="material-symbols:chevron-right"></Icon>
    </button>
</template>
