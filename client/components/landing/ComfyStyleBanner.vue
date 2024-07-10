<script setup lang="ts">
interface Item {
    imgPath: string;
    title: string;
    desc: string;
}

interface Props {
    title: string;
    desc: string;
    imgPath: string;
    items: Array<Item>;
}

defineProps<Props>();
</script>

<template>
    <div class="py-8 px-16 flex bg-c-skin-light rounded">
        <div class="flex flex-col gap-8 justify-center">
            <div class="text-3xl text-c-black-txt font-bold">{{ title }}</div>
            <div class="text-base text-c-gray">{{ desc }}</div>
            <Button
                :text="'Show more'"
                :icon-side="'right'"
                :variant="'secondary'"
                :size="'sm'"
                :icon-name="'streamline:interface-arrows-right-arrow-right-keyboard'"
            ></Button>
        </div>
        <img
            :src="imgPath"
            alt=""
            class="translate-y-8"
            width="500"
            loading="lazy"
        />
    </div>
</template>
