<script setup lang="ts">
interface Props {
    product: Product;
    discountValue?: number;
}

defineProps<Props>();
</script>

<template>
    <NuxtLink
        :to="{
            name: 'products-category-product',
            params: {
                category: product.categories[0].slug,
                product: product.id,
            },
        }"
        class="bg-white rounded-xl p-12 shadow relative"
    >
        <div class="w-2/3">
            <div class="text-c-gray text-xs">
                {{ product.categories[0].name.en }}
            </div>
            <div class="text-xl text-c-black-txt font-bold">
                {{ product.name.en }}
            </div>
            <Rating
                :value="product.reviews_avg"
                :reviews-count="product.reviews_count"
                class="my-2"
            ></Rating>
            <div class="flex gap-2 items-center">
                <span class="text-2xl font-bold text-c-black-txt"
                    >${{ product.catalogue_price * 0.5 }}</span
                >
                <span class="line-through text-c-gray"
                    >${{ product.catalogue_price }}</span
                >
            </div>
            <Button
                class="w-fit text-c-gray mt-2"
                :icon-name="'streamline:interface-arrows-right-arrow-right-keyboard'"
                :icon-side="'right'"
                :variant="'ghost'"
                :text="'View more'"
                :size="'xs'"
            ></Button>
        </div>
        <slot></slot>
    </NuxtLink>
</template>
