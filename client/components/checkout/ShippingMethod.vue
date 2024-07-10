<script setup lang="ts">
const { cart } = useCartStore();
const { getCart } = useCart();

watch(
    () => cart.value.shipment_key,
    async (newShipmentMethod, oldShipmentMethod) => {
        if (newShipmentMethod !== oldShipmentMethod) {
            await useMyFetch("api/cart/shipment-key", {
                method: "POST",
                body: {
                    shipment_key: newShipmentMethod,
                },
                onResponse() {
                    getCart();
                },
            });
        }
    }
);
</script>

<template>
    <div>
        <h3 class="text-lg font-semibold text-c-black-txt">Choose shipping:</h3>
        <div class="mt-4 flex flex-col gap-2 -ml-2.5">
            <InputRadio
                class="text-c-black-txt"
                v-model="cart.shipment_key"
                value="personal_collection"
                >Personal collection (Free)</InputRadio
            >
            <InputRadio
                v-model="cart.shipment_key"
                value="delivery"
                class="text-c-black-txt"
                >Delivery at home ($20)</InputRadio
            >
        </div>
    </div>
</template>
