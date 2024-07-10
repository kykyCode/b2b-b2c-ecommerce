<script setup lang="ts">
interface Props {
    title: string;
    link: string | object;
    iconName: string;
    desc?: string;
}

defineProps<Props>();
</script>

<template>
    <NuxtLink
        :to="link"
        class="flex gap-2 w-fit py-2 lg:py-8 border-b-2 border-transparent hover:border-c-orange transition-all group"
    >
        <Icon
            class="text-5xl group-hover:text-c-orange transition-all"
            :name="iconName"
        ></Icon>
        <div class="my-auto">
            <div
                class="text-left whitespace-nowrap font-medium text-c-black-txt"
            >
                {{ title }}
            </div>
            <div
                v-if="desc"
                class="font-thin text-sm whitespace-nowrap text-left -mt-0.5"
            >
                {{ desc }}
            </div>
        </div>
    </NuxtLink>
</template>
