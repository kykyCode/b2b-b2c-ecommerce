<script lang="ts" setup>
const { me } = useAuth();
const { setCart } = useCartStore();

const initializeAuth = async () => {
    const { error } = await useMyFetch("sanctum/csrf-cookie", {
        credentials: "include",
    });

    if (error.value) {
        throw new Error("CSRF TOKEN error");
    }

    await me();
};

initializeAuth();

await useMyFetch("/api/cart", {
    credentials: "include",
    onResponse({ response }) {
        setCart(response._data);
    },
});

const { user } = useUserStore();
</script>

<template>
    <div class="font-custom overflow-x-hidden">
        <NuxtLoadingIndicator :height="3" color="#fcaf18" :duration="2000" />
        <NuxtLayout>
            <NuxtPage></NuxtPage>
        </NuxtLayout>
        <Toasts />
    </div>
</template>
