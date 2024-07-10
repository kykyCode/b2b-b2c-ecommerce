<script setup lang="ts">
interface Props {
    title: string;
    buttonText: string;
    link?: string | object;
}

defineProps<Props>();
</script>

<template>
    <div class="flex justify-between items-end text-c-black-txt">
        <div class="text-lg lg:text-2xl font-semibold">{{ title }}</div>
        <Button
            :text="buttonText"
            :link="link"
            :variant="'ghost'"
            :icon-side="'right'"
            class="font-medium"
            :icon-name="'streamline:interface-arrows-right-arrow-right-keyboard'"
        >
        </Button>
    </div>
</template>
