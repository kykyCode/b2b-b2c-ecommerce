<script setup lang="ts">
interface Props {
    text: string;
    link: string | object;
    isActive: boolean;
    iconName: string;
}

defineProps<Props>();

const { user } = useUserStore();
</script>

<template>
    <NuxtLink
        :to="link"
        class="rounded-t-2xl py-4 px-16 font-semibold text-c-black-txt text-lg flex items-center relative"
        :class="[
            { 'bg-c-orange text-white': isActive },
            {
                'outline-t-2 outline-gray-200 bg-gray-50': !isActive,
            },
        ]"
    >
        <Icon :name="iconName" class="text-3xl mr-3"></Icon> {{ text }}
        <span
            class="ml-2"
            v-if="
                text == 'Notifications' &&
                user &&
                user.id &&
                user.notification_count !== 0
            "
        >
            ({{ user.notification_count }})</span
        >
    </NuxtLink>
</template>
