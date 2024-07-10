<script setup>
const showCatalog = ref(false);
const triggerCatalog = () => {
    showCatalog.value = !showCatalog.value;
};

const showSearchBox = ref(false);

const toggleSearchBox = () => {
    showSearchBox.value = !showSearchBox.value;
};

const searchBoxRef = ref(null);

onClickOutside(searchBoxRef, () => toggleSearchBox());

const { cart } = useCartStore();
const { user } = useUserStore();
</script>

<template>
    <div>
        <div class="flex items-center justify-between">
            <div class="flex gap-16 items-center">
                <Logo />
                <div>
                    <div class="flex items-center gap-12 relative">
                        <HeaderNavigationButton
                            :class="[{ 'pointer-events-none': showCatalog }]"
                            :text="'ALL'"
                            :icon-name="'uiw:appstore-o'"
                            @click="triggerCatalog"
                        ></HeaderNavigationButton>
                        <HeaderNavigationButton
                            :text="'Today\'s Deals'"
                        ></HeaderNavigationButton>
                        <HeaderNavigationButton
                            :text="'Gift Cards'"
                        ></HeaderNavigationButton>
                        <HeaderNavigationButton
                            :text="'Registry & Gifts'"
                        ></HeaderNavigationButton>
                        <ClientOnly>
                            <Catalog
                                v-model="showCatalog"
                                class="absolute top-12 left-0 transition-all height-0 z-50"
                            />
                        </ClientOnly>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 items-center">
                <HeaderNavigationIconButton
                    :link="{ name: 'dashboard-profile' }"
                    :icon-name="'material-symbols-light:person-2-outline-rounded'"
                    :count="user?.notification_count"
                ></HeaderNavigationIconButton>
                <HeaderNavigationIconButton
                    :link="{ name: 'checkout-items' }"
                    :icon-name="'material-symbols-light:shopping-cart-outline-rounded'"
                    :count="cart?.items.length"
                ></HeaderNavigationIconButton>
            </div>
        </div>
    </div>
</template>

<style scoped>
.search-box {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    width: 70%;
    opacity: 1;
    transition: opacity 0.3s ease, transform 0.3s ease-in-out;
}

.fade-scale-enter-active,
.fade-scale-leave-active {
    transition: opacity 0.3s, transform 0.3s;
}

.fade-scale-enter-from,
.fade-scale-leave-to {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.1);
}

.fade-scale-enter-to,
.fade-scale-leave-from {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}
</style>
