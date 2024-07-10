<script setup lang="ts">
interface Props {
    totalPrice?: number;
}

defineProps<Props>();

const { cart } = useCartStore();
const { getCart } = useCart();

watch(
    () => cart.value.payment_key,
    async (newPaymentMethod, oldPaymentMethod) => {
        if (newPaymentMethod !== oldPaymentMethod) {
            await useMyFetch("api/cart/payment-key", {
                method: "POST",
                body: {
                    payment_key: newPaymentMethod,
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
        <div class="text-lg font-semibold text-c-black-txt">
            Payment method:
        </div>

        <div class="flex flex-col gap-2 mt-2 -ml-2.5">
            <InputRadio
                class="text-c-black-txt"
                v-model="cart.payment_key"
                value="stripe"
                name="payment2"
            >
                <span>
                    <Icon name="fa6-brands:stripe-s" class="text-xl" />
                </span>
                <span>Stripe</span>
            </InputRadio>
        </div>
    </div>
</template>
