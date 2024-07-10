<script setup lang="ts">
interface Props {
    title: string;
    imgPath: string;
    departmentId: string | number;
}

defineProps<Props>();
</script>

<template>
    <NuxtLink
        :to="{
            name: 'departments-department',
            params: { department: departmentId },
        }"
        class="rounded-sm bg-c-skin-light py-12 hover:shadow-c hover:bg-white hover:rounded-lg transition-all p-6"
    >
        <img :src="imgPath" alt="" loading="lazy" class="p-4" />
        <div class="text-xl text-c-black-txt mt-12 text-center font-medium">
            {{ title }}
        </div>
        <div class="text-c-gray font-medium text-sm text-center">
            13 categories
        </div>
    </NuxtLink>
</template>
