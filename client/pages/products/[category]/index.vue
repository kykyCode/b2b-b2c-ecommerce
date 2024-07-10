<script setup lang="ts">
const route = useRoute();
const router = useRouter();

const sortOption = ref("Price desc");
const { lastViewedProductCount } = useLastViewedProductsCount();

const clientFilters = reactive({
    price_from: (route.query.price_from as string) || null,
    price_to: route.query.price_to || null,
    colors: (route.query.colors as string[]) || [],
    brands: (route.query.brands as string[]) || [],
    rating: (route.query.rating as string) || null,
    page: Number(route.query.page) || 1,
});

const fetchQueryFriendlyFilters = computed(() => {
    const filters: Record<string, any> = {};

    Object.entries(clientFilters).forEach(([key, value]) => {
        if (Array.isArray(value)) {
            filters[`${key}[]`] = value;
        } else {
            filters[key] = value;
        }
    });

    return filters;
});

const getSubstringAfterFirstColon = (str: string): string => {
    let index = str.indexOf(":");
    if (index !== -1) {
        return str.substring(index + 1);
    }
    return str;
};

const getSubstringBeforeFirstColon = (str: string): string => {
    let index = str.indexOf(":");
    if (index !== -1) {
        return str.substring(0, index);
    }
    return str;
};

const resetFilters = () => {
    clientFilters.brands = [];
    clientFilters.colors = [];
    clientFilters.rating = null;
    clientFilters.page = 1;
    clientFilters.price_from = null;
    clientFilters.price_to = null;
};

const removeFilter = (key: string, value: string): void => {
    if (Array.isArray(clientFilters[key])) {
        clientFilters[key] = clientFilters[key].filter(
            (item) => item !== value
        );
    } else {
        clientFilters[key] = null;
    }
};

const { queryString } = useApiQuery({
    categories: [route.params.category as string],
});

const { data: products, status } = await useMyFetch<
    ApiPaginationResponse<ListingProduct>
>(`api/products?${queryString.value}`, {
    query: fetchQueryFriendlyFilters,
});

const { data: category } = await useMyFetch<Category>(
    `api/categories/${route.params.category}`
);

const { data: filters } = await useMyFetch("api/global/filters");

const { data: lastViewedProducts } = await useMyFetch<Product>(
    "api/last-viewed-products?limit=5",
    {
        credentials: "include",
    }
);

const badges = computed(() => {
    const badgeArray: string[] = [];

    Object.entries(clientFilters).forEach(([key, value]) => {
        if (key === "page") return;

        if (Array.isArray(value) && value.length) {
            value.forEach((item) => {
                badgeArray.push(`${key}:${item}`);
            });
        } else if (
            !Array.isArray(value) &&
            value !== null &&
            value !== undefined &&
            value !== ""
        ) {
            badgeArray.push(`${key}:${value}`);
        }
    });

    return badgeArray;
});

watch(
    clientFilters,
    (newFilters) => {
        const query = { ...route.query };

        Object.entries(newFilters).forEach(([key, value]) => {
            if (Array.isArray(value)) {
                query[key] = value.length ? value : undefined;
            } else {
                query[key] =
                    value !== null && value !== undefined ? value : undefined;
            }
        });

        router.replace({ query });
    },
    { deep: true }
);

const filterSidebarOpened = ref(false);
</script>

<template>
    <div v-if="products && products.data && category">
        <div class="">
            <ListingHead
                :category="category"
                :products-count="products?.total"
            />
            <div class="flex gap-12 mt-8">
                <div class="w-1/5 hidden lg:flex flex-col gap-6">
                    <ListingFilterDropdown class="w-full" :title="'Seller'">
                        <InputCheckbox
                            class="mb-4"
                            v-for="item in filters.brands"
                        >
                            <span class="text-c-gray font-medium">
                                {{ item }}
                            </span>
                        </InputCheckbox>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown
                        class="w-full"
                        :title="'Customer Rating From'"
                    >
                        <InputRadio
                            v-model="clientFilters.rating"
                            :value="item"
                            v-for="item in [5, 4, 3, 2, 1]"
                            :key="item"
                            class="mb-4"
                        >
                            <Rating :value="item" :label="`${item}.0`" />
                        </InputRadio>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown class="w-full" :title="'Colors'">
                        <InputCheckbox
                            class="mb-4"
                            v-model="clientFilters.colors"
                            v-for="color in filters.colors"
                            :value="color.value"
                            :key="color.value"
                        >
                            <ProductColorSwatch
                                :color="{
                                    name: color.value,
                                    hex: color.optional_value,
                                }"
                            />
                        </InputCheckbox>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown class="w-full" title="Price">
                        <div
                            class="flex justify-between overflow-x-hidden text-c-gray items-center"
                        >
                            <InputText
                                v-model="clientFilters.price_from"
                                placeholder="Price from"
                                :type="'number'"
                                :max-length="10"
                                class="w-1/2"
                            />
                            <span class="text-3xl mx-4 text-c-gray">-</span>
                            <InputText
                                v-model="clientFilters.price_to"
                                placeholder="Price to"
                                :type="'number'"
                                :max-length="10"
                                class="w-1/2"
                            />
                        </div>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown class="w-full" :title="'Brand'">
                        <InputCheckbox
                            v-for="item in filters.brands"
                            v-model="clientFilters.brands"
                            :value="item"
                            class="mb-4"
                        >
                            <span class="text-c-gray font-medium">
                                {{ item }}
                            </span>
                        </InputCheckbox>
                    </ListingFilterDropdown>
                </div>

                <div class="w-full lg:w-5/6">
                    <div class="flex gap-12 items-end mb-4 lg:mb-6">
                        <ListingPaginationCount
                            class="hidden lg:block w-32"
                            :total="products?.total"
                            :from="products?.from ?? 0"
                            :to="products?.to"
                        />

                        <div class="gap-6 hidden lg:flex">
                            <Badge
                                :variant="'light'"
                                :size="'lg'"
                                close-btn
                                @close-clicked="
                                    removeFilter(
                                        getSubstringBeforeFirstColon(badge),
                                        getSubstringAfterFirstColon(badge)
                                    )
                                "
                                v-for="badge in badges"
                            >
                                <template
                                    v-if="
                                        getSubstringBeforeFirstColon(badge) !=
                                        'rating'
                                    "
                                >
                                    {{ getSubstringAfterFirstColon(badge) }}
                                </template>
                                <template v-else>
                                    <Rating
                                        :value="clientFilters.rating"
                                    ></Rating>
                                </template>
                            </Badge>

                            <button
                                @click="resetFilters"
                                class="py-1 rounded-lg px-2 border-c-skin border-2 text-c-gray font-medium"
                            >
                                Reset
                            </button>
                        </div>
                        <button
                            @click="filterSidebarOpened = true"
                            class="text-sm text-c-orange border-c-orange font-semibold border px-4 py-1 rounded-lg lg:hidden"
                        >
                            Filters
                        </button>
                        <InputSelectSmall
                            class="ml-auto w-32"
                            v-model="sortOption"
                            :icon-name="'ph:arrows-down-up-bold'"
                            :options="['Price desc', 'Price asc', 'A-Z', 'Z-A']"
                        ></InputSelectSmall>
                    </div>

                    <template v-if="products.total != 0">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 gap-x-4 gap-y-4 lg:gap-y-7 min-h-96 relative"
                        >
                            <ProductCard
                                v-for="product in products.data"
                                :product="product"
                                :category="category"
                                :key="product.id"
                            ></ProductCard>
                            <div
                                v-if="status == 'pending'"
                                class="absolute top-0 left-0 w-full h-full z-70 bg-white bg-opacity-70 flex justify-center pt-64"
                            >
                                <Loader></Loader>
                            </div>
                        </div>
                        <ListingPaginationBar
                            :last-page="products.last_page"
                            v-model="clientFilters.page"
                            class="mt-12"
                        />
                    </template>
                    <div
                        v-else
                        class="px-6 lg:px-64 text-center mt-32 text-c-skin mb-36"
                    >
                        <Icon
                            name="material-symbols:sad-tab-outline-sharp"
                            class="text-2xl lg:text-6xl"
                        ></Icon>
                        <div class="lg:text-3xl font-semibold">
                            No Products Found
                        </div>
                        <div class="mt-2 leading-5 text-sm lg:text-base">
                            We're sorry, but there are no products that match
                            your criteria. <br />Please try adjusting your
                            filters or browse our other categories for more
                            options.
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-36 lg:mt-48">
                <LandingDeliveryBanner />
                <LandingSectionRedirect
                    v-if="lastViewedProducts.length !== 0"
                    class="mt-20"
                    title="Last viewed"
                    button-text="Show more"
                    :link="{ name: 'last-viewed-products' }"
                />

                <div
                    class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 mt-4"
                    v-if="lastViewedProducts.length !== 0"
                >
                    <ProductCard
                        v-for="lastViewedProduct in lastViewedProducts.slice(
                            0,
                            lastViewedProductCount
                        )"
                        :product="lastViewedProduct"
                    ></ProductCard>
                </div>
            </div>
        </div>
        <Sidebar v-model="filterSidebarOpened" :title="'Filters'">
            <slot>
                <div class="flex flex-col gap-4">
                    <ListingFilterDropdown class="w-full" :title="'Seller'">
                        <InputCheckbox
                            class="mb-4"
                            v-for="item in filters.brands"
                        >
                            <span class="text-c-gray font-medium">
                                {{ item }}
                            </span>
                        </InputCheckbox>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown
                        class="w-full"
                        :title="'Customer Rating From'"
                    >
                        <InputRadio
                            v-model="clientFilters.rating"
                            :value="item"
                            v-for="item in [5, 4, 3, 2, 1]"
                            :key="item"
                            class="mb-4"
                        >
                            <Rating :value="item" :label="`${item}.0`" />
                        </InputRadio>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown class="w-full" :title="'Colors'">
                        <InputCheckbox
                            class="mb-4"
                            v-model="clientFilters.colors"
                            v-for="color in filters.colors"
                            :value="color.value"
                            :key="color.value"
                        >
                            <ProductColorSwatch
                                :color="{
                                    name: color.value,
                                    hex: color.optional_value,
                                }"
                            />
                        </InputCheckbox>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown class="w-full" title="Price">
                        <div
                            class="flex justify-between overflow-x-hidden text-c-gray items-center"
                        >
                            <InputText
                                v-model="clientFilters.price_from"
                                placeholder="Price from"
                                :type="'number'"
                                :max-length="10"
                                class="w-1/2"
                            />
                            <span class="text-3xl mx-4 text-c-gray">-</span>
                            <InputText
                                v-model="clientFilters.price_to"
                                placeholder="Price to"
                                :type="'number'"
                                :max-length="10"
                                class="w-1/2"
                            />
                        </div>
                    </ListingFilterDropdown>

                    <ListingFilterDropdown class="w-full" :title="'Brand'">
                        <InputCheckbox
                            v-for="item in filters.brands"
                            v-model="clientFilters.brands"
                            :value="item"
                            class="mb-4"
                        >
                            <span class="text-c-gray font-medium">
                                {{ item }}
                            </span>
                        </InputCheckbox>
                    </ListingFilterDropdown>
                </div>
            </slot>
        </Sidebar>
    </div>
</template>
