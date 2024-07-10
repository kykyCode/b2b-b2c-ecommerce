<script setup lang="ts">
interface Props {
    name: String;
    title: String;
}

const props = defineProps<Props>();
</script>

<template>
    <td class="py-5 px-6 border-b text-c-black-txt text-lg">
        <slot />
    </td>
</template>
