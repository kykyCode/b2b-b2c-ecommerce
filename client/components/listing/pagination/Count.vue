<script setup lang="ts">
interface Props {
    from?: number;
    to?: number;
    total?: number;
}

defineProps<Props>();
</script>

<template>
    <div class="text-lg text-c-gray font-medium whitespace-nowrap">
        {{ from }} - {{ to }} of {{ total }} results
    </div>
</template>
