<script setup lang="ts">
interface Props {
    iconName: string;
    link: string | object;
    count: number;
}

defineProps<Props>();
</script>

<template>
    <div class="relative">
        <Button
            :variant="'ghost'"
            :size="'2xl'"
            :icon-name="iconName"
            :link="link"
        ></Button>
        <span
            v-if="count && count !== 0"
            class="h-5 w-5 bg-c-orange rounded-full absolute -top-2 right-0 text-xs text-white flex font-medium items-center justify-center"
        >
            {{ count }}
        </span>
    </div>
</template>
