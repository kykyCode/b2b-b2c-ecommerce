<script setup lang="ts">
interface Props {
    notification: Notification;
}

defineProps<Props>();
</script>

<template>
    <NuxtLink
        :to="{
            name: 'dashboard-notifications-notification',
            params: { notification: notification.id },
        }"
        class="p-4 rounded hover:shadow-c relative border"
    >
        <div class="lg:pr-64">
            <div class="text-lg font-semibold text-c-black-txt">
                {{ notification.title }}
            </div>
            <div class="text-c-black-txt mt-1 leading-5 text-xs">
                {{ notification.content.slice(0, 150) }}...
            </div>
            <div class="mt-2 text-xs text-c-gray">
                {{ notification.created_at }}
            </div>
        </div>
        <button
            class="absolute bottom-6 right-6 h-3 w-3 rounded-full border"
            :class="notification.is_read ? 'border-gray-400' : 'bg-c-orange'"
        ></button>
    </NuxtLink>
</template>
