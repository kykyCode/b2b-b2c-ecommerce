<script setup>
const { user } = useUserStore();

const { data: homeData } = await useMyFetch("api/home-data");

const { lastViewedProductsCount } = useLastViewedProductsCount();
const lastViewedProducts = computed(() => {
    return homeData.value.last_viewed_products.slice(
        0,
        lastViewedProductsCount.value
    );
});
</script>

<template>
    <div class="flex flex-col gap-4 pb-16">
        <LandingMainBanner :products="homeData.discount_deals" />
        <LandingUserPanel v-if="user && user.id" />

        <LandingSectionRedirect
            v-if="lastViewedProducts && lastViewedProducts.length !== 0"
            class="mt-20"
            title="Last Viewed"
            button-text="Show more"
            :link="{ name: 'last-viewed-products' }"
        />

        <div
            class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4"
        >
            <ProductCard
                v-for="item in lastViewedProducts"
                :product="item"
                :key="item.id"
            />
        </div>

        <LandingDeliveryBanner />

        <LandingSectionRedirect
            class="mt-20"
            title="Shop by department"
            button-text="Show more"
            :link="{ name: 'departments' }"
        />

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <LandingDepartmentBanner
                v-for="department in homeData.departments"
                :key="index"
                :title="department.name.en"
                :img-path="department.main_image"
                :department-id="department.id"
            />
        </div>

        <div class="grid-cols-1 2xl:grid-cols-2 gap-4 hidden lg:grid">
            <LandingComfyStyleBanner
                img-path="/images/demo/comfy-woman.png"
                title="Comfy styles for her"
                desc="Shop Amazon Fashion including clothing, shoes, jewelry, watches, bags, and more."
            />
            <LandingComfyStyleBanner
                img-path="/images/demo/comfy-man.webp"
                title="Comfy styles for him"
                desc="Shop Amazon Fashion including clothing, shoes, jewelry, watches, bags, and more."
            />
        </div>
        <template v-if="user && user.id">
            <LandingSectionRedirect
                class="mt-20"
                :title="`${user.first_name}, we have prepared products for you`"
                button-text="Show more"
                link="/"
            />

            <div
                class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4"
            >
                <ProductCard
                    v-for="product in homeData.recommended_products"
                    :product="product"
                    :key="product.id"
                />
            </div>

            <LandingSectionRedirect
                class="mt-20"
                title="Here are your favorite departments too"
                button-text="Show more"
                :link="{ name: 'departments' }"
            />

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <LandingDepartmentBanner
                    v-for="department in homeData.recommended_departments"
                    :key="index"
                    :title="department.name.en"
                    :img-path="department.main_image"
                    :department-id="department.id"
                />
            </div>
        </template>

        <LandingNewsletterBanner />
    </div>
</template>
