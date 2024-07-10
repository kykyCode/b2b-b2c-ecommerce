<script setup lang="ts">
interface Props {
    shippingPrice: number;
    itemsCount: number;
    itemsPrice: number;
    totalPrice: number;
}

withDefaults(defineProps<Props>(), {
    shippingPrice: 0,
    itemsCount: 0,
    itemsPrice: 0,
    totalPrice: 0,
});

const { cart } = useCartStore();
</script>

<template>
    <div class="min-w-56 text-c-gray flex flex-col gap-2">
        <div class="flex justify-between">
            <div>Subtotal ({{ itemsCount }})</div>
            <div>${{ itemsPrice.toFixed(2) }}</div>
        </div>

        <div class="flex justify-between" v-if="shippingPrice">
            <div>Shipping</div>
            <div>${{ shippingPrice.toFixed(2) }}</div>
        </div>

        <div class="flex justify-between">
            <div>Cart Total</div>
            <div class="text-2xl text-c-black-txt font-semibold">
                ${{ totalPrice.toFixed(2) }}
            </div>
        </div>
    </div>
</template>
