<script setup lang="ts">
definePageMeta({
    step: "notifications",
});

const { data: notifications } = await useMyFetch<Array<Notification>>(
    "api/user/notifications"
);
</script>

<template>
    <div>
        <DashboardNavigation />
        <div class="flex flex-col gap-4 mt-6">
            <DashboardNotificationCard
                v-for="notification in notifications"
                :key="notification.id"
                :notification="notification"
            />
        </div>
    </div>
</template>
