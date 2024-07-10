<script setup lang="ts">
const route = useRoute();
const router = useRouter();
const { user } = useUserStore();

const { data: product } = await useMyFetch<Product>(
    `api/products/${route.params.product}`,
    {
        credentials: "include",
    }
);

const { data: recommendedProducts } = await useMyFetch<Array<Products>>(
    "api/user/recommended-products"
);

const items = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    {
        name: product.value.category_name.en,
        to: {
            name: "products-category",
            params: { category: product.value.category_slug },
        },
    },
    {
        name: product.value.name.en,
        to: {
            name: "products-category-product",
            params: {
                category: product.value.category_slug,
                product: product.value.id,
            },
        },
    },
]);

const selectedVariant = ref<RelatedProduct>({
    id: product.value.id,
    main_image: product.value.main_image,
    category_slug: route.params.category,
});

const setSelectedVariant = (variant: RelatedProduct) => {
    selectedVariant.value = variant;
};

const { addItem } = useCart();

const addToCart = async () => {
    await addItem(product.value.id, 1);
};

const addToFavorites = async (): Promise<void> => {
    await useMyFetch("api/user/add-product-to-favorites", {
        credentials: "include",
        method: "POST",
        body: {
            product_id: product.value.id,
        },
        onResponse({ response }) {
            product.value.is_favorite = true;
        },
    });
};

const removeFromFavorites = async (): Promise<void> => {
    await useMyFetch("api/user/remove-product-from-favorites", {
        credentials: "include",
        method: "POST",
        body: {
            product_id: product.value.id,
        },
        onResponse({ response }) {
            product.value.is_favorite = false;
        },
    });
};

provide("addToFavorites", addToFavorites as (id: number) => void);
provide("removeFromFavorites", removeFromFavorites as (id: number) => void);

provide("addToCart", addToCart as (id: number) => void);

provide(
    "setSelectedVariant",
    setSelectedVariant as (variant: RelatedProduct) => void
);

provide("selectedVariant", selectedVariant as RelatedProduct);

watch(
    [() => route.params.product, selectedVariant],
    ([routeProduct, variant]) => {
        if (routeProduct != variant.id) {
            router.push({
                name: "products-category-product",
                params: {
                    product: variant.id,
                    category: variant.category_slug,
                },
            });
        }
    }
);

const { lastViewedProductsCount: productsCount } = useLastViewedProductsCount();
</script>

<template>
    <div>
        <Breadcrumbs :items="items" class="px-4" />

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-16 mt-4">
            <ProductGallery
                v-if="product"
                :is-favorite="product.is_favorite"
                :images="[product.main_image, ...product.images]"
            />

            <ProductDetails v-if="product" :product="product" />
        </section>

        <LandingDeliveryBanner class="mt-32" />

        <template v-if="user && user.id">
            <LandingSectionRedirect
                class="mt-24 lg:mt-40"
                title="Recommended for you"
                button-text="Show more"
                :link="'/'"
            />
            <section
                v-if="recommendedProducts"
                class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 mt-6"
            >
                <ProductCard
                    v-for="product in recommendedProducts.slice(
                        0,
                        productsCount
                    )"
                    :product="product"
                    :key="product.id"
                />
            </section>
        </template>
    </div>
</template>
