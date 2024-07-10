<script setup lang="ts">
const route = useRoute();
const router = useRouter();
const { cart } = useCartStore();
const { getCart } = useCart();
const { me } = useAuth();

const address = inject("address") as Address;
const isFormValid = inject("isFormValid" as Boolean);

const processing = ref(false);
const completeOrder = async () => {
    processing.value = true;
    let data = {
        notes: "lorem ipsum",
        payment_method_key: cart.value.payment_key,
        shipping_method_key: cart.value.shipment_key,
        address: address.value,
    };

    await useMyFetch("api/orders", {
        method: "POST",
        body: data,
        credentials: "include",
        onResponse({ response }) {
            getCart();
            processing.value = false;
            me();
            router.push({ name: "checkout-thank-you" });
        },
        onResponseError() {
            processing.value = false;
        },
    });
};
</script>

<template>
    <div
        :class="[{ 'opacity-80 pointer-events-none': cart.items.length === 0 }]"
    >
        <CheckoutPaymentMethod :total-price="cart.total" />
        <CheckoutShippingMethod class="mt-6" />
        <CheckoutPriceSummary
            class="mt-12 lg:mt-6"
            :items-count="cart.items.length"
            :shipping-price="cart.shipment_price"
            :total-price="cart.total"
            :items-price="cart.total_items_price"
        />
        <Button
            v-if="route.meta.checkoutStep == 'items'"
            :link="{ name: 'checkout-delivery' }"
            :text="'Go to delivery'"
            :disabled="cart.items.length === 0"
            :variant="'primary'"
            class="w-full mt-6"
        />
        <Button
            @click="completeOrder"
            v-if="route.meta.checkoutStep == 'delivery'"
            :disabled="
                !cart.shipment_key ||
                !cart.payment_key ||
                !isFormValid ||
                processing
            "
            :text="'Complete order'"
            :variant="'primary'"
            class="w-full mt-6"
        />
        <div class="flex justify-center mt-12">
            <Loader v-if="processing"></Loader>
        </div>
    </div>
</template>
