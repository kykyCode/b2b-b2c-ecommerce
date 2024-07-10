<script setup lang="ts">
interface Props {
    text: string;
    iconName?: string;
}

defineProps<Props>();
</script>

<template>
    <button
        class="text-black font-medium text-xl hover:text-c-orange transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-c-orange"
        :aria-label="text"
    >
        <span class="flex items-center gap-2 whitespace-nowrap">
            <Icon
                v-if="iconName"
                size="18px"
                :name="iconName"
                aria-hidden="true"
            ></Icon>
            {{ text }}
        </span>
    </button>
</template>
