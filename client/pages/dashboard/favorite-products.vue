<script setup lang="ts">
definePageMeta({
    step: "favorite-products",
    middleware: ["auth"],
});

const { data: favoriteProducts } = await useMyFetch<Array<Product>>(
    "api/user/favorite-products"
);
</script>

<template>
    <div class="min-h-[700px]">
        <DashboardNavigation />
        <div
            class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6 mt-12"
        >
            <ProductCard
                v-for="product in favoriteProducts"
                :product="product"
                :key="product.id"
            ></ProductCard>
        </div>
    </div>
</template>
