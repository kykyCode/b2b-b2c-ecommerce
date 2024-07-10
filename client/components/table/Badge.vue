<script setup lang="ts">
import { computed } from "vue";

interface Props {
    text: string;
    color: "red" | "green" | "yellow" | "gray" | "orange" | "blue";
}

const props = defineProps<Props>();
</script>

<template>
    <div
        class="w-fit py-0.5 px-6 text-center rounded-full font-medium text-sm"
        :class="[
            {
                'border-green-400 text-green-800 bg-green-100':
                    color === 'green',
            },
            {
                'border-red-400 text-red-900 bg-red-100': color === 'red',
            },
            {
                'border-gray-400 text-gray-600 bg-gray-100': color === 'gray',
            },
            {
                'border-orange-400 text-orange-800 bg-orange-100':
                    color === 'orange',
            },
            {
                'border-blue-400 text-blue-800 bg-blue-100': color === 'blue',
            },
            {
                'border-yellow-400 text-yellow-800 bg-yellow-200':
                    color === 'yellow',
            },
        ]"
    >
        {{ props.text }}
    </div>
</template>
