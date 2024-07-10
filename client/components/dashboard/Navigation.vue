<script setup lang="ts">
const route = useRoute();
</script>

<template>
    <div>
        <div class="border-b border-c-orange gap-2 hidden lg:flex">
            <DashboardNavigationItem
                :is-active="route.meta.step == 'profile'"
                icon-name="material-symbols-light:account-circle-outline"
                :text="'Profile'"
                :link="{ name: 'dashboard-profile' }"
            />
            <DashboardNavigationItem
                :is-active="route.meta.step == 'orders'"
                icon-name="material-symbols-light:orders-outline-rounded"
                :text="'Orders'"
                :link="{ name: 'dashboard-orders' }"
            />
            <DashboardNavigationItem
                :is-active="route.meta.step == 'favorite-products'"
                icon-name="material-symbols-light:favorite-outline-rounded"
                :text="'Favorite products'"
                :link="{ name: 'dashboard-favorite-products' }"
            />
            <DashboardNavigationItem
                :is-active="route.meta.step == 'notifications'"
                icon-name="material-symbols-light:notifications-active-outline"
                :text="'Notifications'"
                :link="{ name: 'dashboard-notifications' }"
            />
        </div>
    </div>
</template>
