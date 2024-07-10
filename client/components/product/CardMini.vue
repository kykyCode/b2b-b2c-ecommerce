<script setup lang="ts">
interface Props {
    title: string;
    link: string;
    image: string;
    desc?: string;
}

defineProps<Props>();
</script>

<template>
    <button
        class="flex gap-3 w-fit pr-12 py-4 border-b-2 border-transparent hover:border-c-orange transition-all"
    >
        <img :src="image" alt="" width="80" class="my-auto" loading="lazy" />
        <div class="my-auto">
            <div class="text-left whitespace-nowrap">{{ title }}</div>
            <div
                v-if="desc"
                class="font-thin text-sm whitespace-nowrap text-left"
            >
                {{ desc }}
            </div>
        </div>
    </button>
</template>
