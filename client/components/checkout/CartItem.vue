<script setup lang="ts">
interface Props {
    item: CheckoutCartItem;
}

const props = defineProps<Props>();

const { getCart } = useCart();

const isSelected = ref<Boolean>(true);

const quantity = ref<Number>(props.item.quantity);

const incrementQuantity = (): void => {
    if (quantity.value < 99) {
        quantity.value += 1;
    }
};

const decrementQuantity = (): void => {
    if (quantity.value != 0) {
        quantity.value -= 1;
    }
};

const removeItemFromCart = async (): void => {
    await useMyFetch("api/cart/remove", {
        method: "DELETE",
        body: {
            product_id: props.item.product.id,
        },
        onResponse() {
            getCart();
        },
    });
};

const calculating = ref<Boolean>(false);

watch(quantity, async (newQuantity): void => {
    calculating.value = true;

    await useMyFetch("api/cart/change-quantity", {
        method: "PUT",
        body: {
            product_id: props.item.product.id,
            quantity: newQuantity,
        },

        onResponse() {
            calculating.value = false;
            getCart();
        },
    });
});
</script>

<template>
    <div
        class="bg-c-skin-light px-3 py-4 lg:p-6 rounded-sm flex gap-6 lg:gap-12 shadow-sm relative"
    >
        <InputCheckbox v-model="isSelected" />

        <img
            class="w-20 lg:w-2/12 h-auto object-contain"
            :src="item.product.main_image"
        />

        <div
            class="flex flex-col gap-1 lg:gap-3 lg:w-1/3 lg:my-auto text-c-black-txt"
        >
            <span class="text-2xs lg:text-base text-c-orange"
                >Product available</span
            >
            <span class="text-sm lg:text-lg font-semibold">{{
                item.product?.name.en
            }}</span>

            <div class="text-xs lg:text-base text-c-gray flex items-center">
                <span class="whitespace-nowrap text-c-black-txt"
                    >Quantity:</span
                >
                <div class="flex gap-3 ml-4 text-lg text-c-black-txt">
                    <button @click="decrementQuantity">
                        <Icon name="material-symbols:remove" />
                    </button>
                    <input
                        v-model.lazy="quantity"
                        type="number"
                        class="no-arrows text-center bg-transparent font-medium w-12 outline outline-1 rounded-sm outline-c-gray"
                    />
                    <button @click="incrementQuantity">
                        <Icon name="material-symbols:add" />
                    </button>
                </div>
            </div>

            <span
                class="text-base lg:text-lg lg:hidden text-c-black-txt font-semibold"
                >${{ item.total_item_price.toFixed(2) }}</span
            >
        </div>

        <span
            class="hidden lg:block text-2xl font-semibold text-c-black-txt my-auto"
            >${{ item.total_item_price.toFixed(2) }}</span
        >

        <div
            class="hidden lg:flex flex-col justify-between gap-6 ml-auto my-auto"
        >
            <Button
                @click="removeItemFromCart"
                icon-name="material-symbols-light:delete-outline-rounded"
                variant="text"
                size="2xl"
            />
        </div>

        <Button
            @click="removeItemFromCart"
            icon-name="material-symbols-light:delete-outline-rounded"
            variant="text"
            size="xl"
            class="absolute top-3 right-1 lg:hidden"
        />

        <div
            v-if="calculating"
            class="absolute top-0 left-0 w-full h-full bg-white bg-opacity-50 flex justify-center items-center"
        >
            <Loader />
        </div>
    </div>
</template>

<style scoped>
.no-arrows::-webkit-outer-spin-button,
.no-arrows::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.no-arrows[type="number"] {
    -moz-appearance: textfield;
}
</style>
