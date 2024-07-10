<script setup lang="ts">
definePageMeta({
    layout: "auth",
});

const route = useRoute();
</script>

<template>
    <div class="flex justify-center items-center h-full">
        <div class="flex flex-col gap-8">
            <Logo class="mx-auto"></Logo>
            <div class="text-center">
                <h1 class="text-3xl font-semibold">
                    Thank You for Registering!
                </h1>
                <h2 class="text-xl font-medium mt-6">
                    We're excited to have you on board.
                </h2>
                <p class="mt-2 text-c-gray w-[430px] mx-auto">
                    Soon, you'll receive an email on
                    <span class="font-semibold">{{ route.query.email }}</span>
                    with an activation link to complete your registration.
                    Please check your inbox and follow the instructions to get
                    started.
                </p>
            </div>
            <Button
                :link="'/'"
                :text="'Home'"
                :variant="'primary'"
                class="w-full"
            ></Button>
        </div>
    </div>
</template>
