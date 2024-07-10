<script setup lang="ts">
definePageMeta({
    checkoutStep: "items",
    middleware: ["auth"],
});

const { cart } = useCartStore();
</script>

<template>
    <div>
        <h2 class="text-2xl lg:text-4xl text-c-black-txt font-semibold">
            Shopping Cart
        </h2>

        <div class="flex flex-wrap lg:flex-nowrap gap-16 mt-6 lg:mt-12">
            <div
                class="w-full flex flex-col gap-4 lg:gap-6 lg:w-3/4"
                v-if="cart.items.length > 0"
            >
                <CheckoutCartItem
                    v-for="item in cart.items"
                    :item="item"
                    :key="item.id"
                />
            </div>
            <div v-else class="w-3/4 mt-8">Your cart is empty...</div>
            <CheckoutSummary class="w-full lg:w-1/4"></CheckoutSummary>
        </div>
    </div>
</template>
