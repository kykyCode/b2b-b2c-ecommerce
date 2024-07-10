<script setup lang="ts">
const route = useRoute();
const { me } = useAuth();

const { data: notification } = await useMyFetch<Notification>(
    `api/user/notifications/${route.params.notification}`
);

const items = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Dashboard" },
    { name: "Notifications", to: { name: "dashboard-notifications" } },
    { name: `Notification #${notification.value.id}` },
]);

me();
</script>

<template>
    <div class="min-h-[500px]">
        <Breadcrumbs :items="items" class="mt-4" />
        <div class="text-3xl font-semibold text-c-black-txt mt-12">
            {{ notification.title }}
        </div>
        <div class="text-base mt-6">{{ notification.content }}</div>
        <div class="mt-6 text-c-gray">{{ notification.created_at }}</div>
    </div>
</template>
