<script setup lang="ts">
const { user } = useUserStore();
</script>

<template>
    <div
        class="lg:pl-6 p-4 lg:p-0 bg-c-orange-light rounded-sm justify-between flex flex-wrap lg:flex-nowrap lg:gap-16 relative"
    >
        <LandingUserPanelAvatar class="mx-auto lg:mx-0" />
        <div
            class="flex gap-2 lg:gap-6 lg:pr-6 w-full lg:w-5/6 flex-wrap lg:flex-nowrap mt-6 lg:mt-0"
        >
            <LandingUserPanelItem
                class="flex-1 shadow-c rounded-lg lg:shadow-none flex justify-center lg:justify-start"
                icon-name="material-symbols-light:account-circle-outline"
                :title="'Profile'"
                :link="{ name: 'dashboard-profile' }"
                :desc="'Manage your account settings '"
            />
            <LandingUserPanelItem
                class="flex-1 shadow-c rounded-lg lg:shadow-none flex justify-center lg:justify-start"
                icon-name="material-symbols-light:orders-outline-rounded"
                :title="'Your orders'"
                :link="{ name: 'dashboard-orders' }"
                :desc="'View and track your purchases'"
            />
            <LandingUserPanelItem
                class="flex-1 shadow-c rounded-lg lg:shadow-none flex justify-center lg:justify-start"
                icon-name="material-symbols-light:favorite-outline-rounded"
                :title="'Favorite products'"
                :link="{ name: 'dashboard-favorite-products' }"
                :desc="'Browse items you have favorited'"
            />
        </div>
    </div>
</template>
