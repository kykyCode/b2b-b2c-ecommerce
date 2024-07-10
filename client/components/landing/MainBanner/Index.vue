<script setup lang="ts">
interface Props {
    products: Array<Product>;
}

const props = defineProps<Props>();

const currentProductIndex = ref(0);

const intervalId = ref<ReturnType<typeof setInterval> | null>(null);

const currentProduct = computed(() => {
    return props.products[currentProductIndex.value];
});

const triggerIncrement = () => {
    resetInterval();

    if (currentProductIndex.value < 3) {
        currentProductIndex.value++;
    } else {
        currentProductIndex.value = 0;
    }
};

const startInterval = () => {
    intervalId.value = setInterval(() => {
        triggerIncrement();
    }, 4000);
};

const resetInterval = () => {
    if (intervalId.value !== null) {
        clearInterval(intervalId.value);
    }
    startInterval();
};

onMounted(() => {
    startInterval();
});

onBeforeUnmount(() => {
    if (intervalId.value !== null) {
        clearInterval(intervalId.value);
    }
});
</script>

<template>
    <div
        class="rounded-sm bg-c-skin-light px-6 py-10 lg:p-12 grid grid-cols-1 lg:grid-cols-2 min-h-[500px] lg:min-h-[600px] lg:pb-20 lg:gap-12"
    >
        <div class="flex gap-12 2xl:gap-24">
            <LandingMainBannerStepper
                class="my-auto hidden lg:block"
                v-model="currentProductIndex"
            />
            <div
                class="flex flex-col gap-8 lg:my-auto text-center lg:text-left"
            >
                <div class="text-2xl lg:text-5xl font-black text-c-black-txt">
                    SHOP, COMPUTERS <br />
                    & ACCESSORIES
                </div>
                <div
                    class="leading-6 lg:leading-auto text-lg lg:text-xl 2xl:pr-24"
                >
                    Shop laptops, desktops, monitors, tablets, PC gaming, hard,
                    drives and storage, accessories and more
                </div>
                <Button
                    class="hidden lg:block lg:w-fit"
                    :text="'View more'"
                    :variant="'secondary'"
                    :size="'lg'"
                    :link="{ name: 'departments' }"
                ></Button>
            </div>
        </div>
        <div class="flex-col justify-end relative hidden lg:flex">
            <transition name="slide-fade" mode="out-in">
                <LandingMainBannerProductCard
                    :key="currentProduct.id"
                    :product="currentProduct"
                    class="w-3/4"
                >
                    <div
                        class="absolute -top-40 2xl:-top-60 -right-28 2xl:-right-36 pointer-events-none"
                    >
                        <div class="relative">
                            <img
                                :src="currentProduct.main_image"
                                alt=""
                                class="up-and-down"
                                width="400"
                                loading="lazy"
                            />
                        </div>
                        <div
                            class="w-16 h-16 rounded-full bg-c-orange absolute top-12 right-6 flex items-center justify-center text-xl text-white font-thin up-and-down shadow-x"
                        >
                            -50%
                        </div>
                    </div>
                </LandingMainBannerProductCard>
            </transition>

            <Button
                @click="triggerIncrement"
                class="absolute right-0 top-1/2"
                :variant="'secondary'"
                :size="'xl'"
                :icon-name="'majesticons:chevron-right'"
            ></Button>
        </div>
        <NuxtLink
            class="block lg:hidden"
            :to="{
                name: 'products-category-product',
                params: {
                    category: products[0].categories[0].slug,
                    product: products[0].id,
                },
            }"
        >
            <div class="bg-white shadow-c px-6 py-8 rounded-xl relative mt-8">
                <div class="text-xs text-c-gray">
                    {{ products[0].categories[0].name.en }}
                </div>
                <div class="font-bold text-c-black-txt text-lg mt-1">
                    {{ products[0].name.en }}
                </div>
                <Rating
                    :value="products[0].reviews_avg"
                    :reviews-count="products[0].reviews_count"
                    class="mt-1"
                ></Rating>
                <div
                    class="font-semibold text-c-black-txt mt-4 text-2xl flex items-center gap-2"
                >
                    ${{ products[0].catalogue_price * 0.5 }}
                    <span class="line-through text-base text-c-gray font-normal"
                        >${{ products[0].catalogue_price }}</span
                    >
                </div>
                <img
                    :src="products[0].main_image"
                    class="w-40 h-auto absolute bottom-10 -right-4"
                    alt=""
                />
            </div>
        </NuxtLink>
    </div>
</template>
<style scoped>
@keyframes slideIn {
    from {
        transform: translateX(30px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(-30px);
        opacity: 0;
    }
}

.slide-fade-enter-active {
    animation: slideIn 1s ease;
}

.slide-fade-leave-active {
    animation: slideOut 0.5s ease;
}
@keyframes moveUpDown {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(15px);
    }
}

.up-and-down {
    animation: moveUpDown 3s infinite ease-in-out;
}
</style>
