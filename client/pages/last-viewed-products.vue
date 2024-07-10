<script setup lang="ts">
const { data: lastViewedProducts } = await useMyFetch(
    "api/last-viewed-products",
    {
        credentials: "include",
    }
);
</script>

<template>
    <div class="mt-12">
        <h1 class="text-3xl font-semibold text-c-black-txt">
            Last viewed products
        </h1>
        <div
            class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 mt-12"
        >
            <ProductCard
                v-for="product in lastViewedProducts"
                :product="product"
                :key="product.id"
            />
        </div>
    </div>
</template>
