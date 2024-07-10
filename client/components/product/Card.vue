<script setup lang="ts">
interface Props {
    product: Product;
    category: Category;
}

const props = withDefaults(
    defineProps<{
        product: ListingProduct;
        category?: Category;
    }>(),
    {
        category: { slug: "networking-products-qpNOX" },
        product: { id: "1", name: { en: "DEMO PRODUCT" } },
    }
);
</script>

<template>
    <div
        class="rounded bg-c-skin-light p-6 hover:shadow-c hover:bg-white transition-all duration-150 relative"
    >
        <Icon
            v-if="product.is_favorite"
            name="ic:sharp-favorite"
            class="absolute top-6 right-6 text-2xl text-c-orange"
        ></Icon>
        <div class="flex flex-wrap gap-1 mb-10">
            <Badge>Best seller</Badge>
            <Badge :variant="'gray'">Section</Badge>
        </div>
        <img
            :src="product?.main_image"
            alt=""
            class="mx-auto mt-3"
            width="144"
            loading="lazy"
        />
        <div class="text-xs text-c-gray mt-10">Ships to Ukraine</div>
        <NuxtLink
            :to="{
                name: 'products-category-product',
                params: { category: category.slug, product: product.id },
            }"
            class="text-lg text-c-black-txt font-semibold leading-6 mt-4 block whitespace-nowrap"
        >
            {{ product?.name.en }}
        </NuxtLink>
        <Rating class="mt-4" :value="4.5" :reviews-count="32"></Rating>
        <div class="text-2xl font-semibold text-c-black-txt pt-5 pb-4">
            ${{ product?.catalogue_price }}
        </div>
    </div>
</template>
