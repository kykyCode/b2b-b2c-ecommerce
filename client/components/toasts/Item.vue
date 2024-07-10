<script setup lang="ts">
interface Props {
    text: string;
    type?: "info" | "success" | "error";
}

const props = withDefaults(defineProps<Props>(), {
    type: "info",
});
</script>

<template>
    <div
        data-test="toast-item"
        class="w-full rounded-lg py-3.5 px-12 font-medium tracking-tight flex gap-2 items-center shadow-sm"
        :class="{
            ' text-c-black-txt': type === 'info',
            'bg-c-orange shadow-c-orange text-white': type === 'success',
            ' border-red-600 bg-red-100 text-red-600 shadow-red-400':
                type === 'error',
        }"
    >
        <Icon
            name="bx:bxs-check-circle"
            class="text-white text-2xl"
            v-if="type === 'success'"
        />
        {{ text }}
    </div>
</template>
