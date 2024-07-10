<script setup lang="ts">
interface Props {
    product: Product;
}

defineProps<Props>();

const route = useRoute();

const addToCart = inject("addToCart") as (id: number) => void;
</script>

<template>
    <div>
        <ProductDetailsHead
            :name="product.name.en"
            :desc="product.desc.en"
            :rating-value="4.5"
            :reviews-count="1233"
            :answered-questions-count="32"
            :last-pieces="product?.stock.quantity <= 10"
        ></ProductDetailsHead>
        <div
            class="text-xs text-c-gray mt-3 flex items-end gap-1"
            v-if="product.stock"
        >
            <span class="font-medium">
                {{ product.stock.quantity }}
            </span>
            in stock |
            <span class="font-medium">
                {{ product.stock.next_delivery_quantity }}
            </span>
            in next delivery ({{ product.stock.next_delivery_date }})
        </div>
        <ProductDetailsVariants
            :variants="product.related_products"
            class="mt-8 -ml-2"
        ></ProductDetailsVariants>
        <div class="leading-3 mt-8">
            <div class="font-semibold text-c-black-txt mb-3 mt-6">
                About this item
            </div>
            <div
                class="text-c-gray mt-0.5 text-sm font-medium"
                v-for="attribute in product.attributes"
            >
                {{ attribute.name.en }} - {{ attribute.pivot.value }}
            </div>
        </div>
        <div class="text-c-black-txt font-semibold text-4xl mt-10">
            ${{ product.catalogue_price }}
        </div>
        <div class="flex gap-3 lg:gap-6 mt-8 lg:mt-4">
            <Button
                :variant="'primary'"
                class="font-medium w-full lg:w-auto"
                :text="'Buy now'"
                :size="'lg'"
                :link="{
                    name: 'checkout-items',
                }"
            ></Button>
            <Button
                @click="addToCart"
                :variant="'secondary'"
                class="font-medium w-full lg:w-auto"
                :text="'Add to cart'"
                :size="'lg'"
            ></Button>
        </div>
    </div>
</template>
