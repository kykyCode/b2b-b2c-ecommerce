<script setup lang="ts">
const currentLang = ref<string>("PL");
const currentCurr = ref<string>("PLN");

const searchPhrase = ref<string>("");

const sidebarOpened = ref<boolean>(false);

const { cart } = useCartStore();
const { user } = useUserStore();

const { data: departments } = await useMyFetch<Array<CatalogDepartment>>(
    "api/global/catalog"
);
</script>

<template>
    <header
        class="container mx-auto flex flex-col gap-5 relative shadow-c lg:shadow-none"
    >
        <section class="hidden lg:flex justify-between items-center">
            <Button
                class="pl-0"
                :text="'Welcome to Amazon - Get to know us'"
                :variant="'text'"
                :size="'xs'"
                :link="{ name: 'about' }"
            ></Button>
            <div class="flex gap-5 items-center">
                <InputSelectSmall
                    v-model="currentLang"
                    :options="['EN', 'PL', 'FR', 'DE']"
                    :placeholder="'Lang'"
                    :icon-name="'gis:globe-o'"
                ></InputSelectSmall>
                <InputSelectSmall
                    :options="['DOL', 'GBP', 'EUR', 'PLN']"
                    :placeholder="'Currency'"
                    v-model="currentCurr"
                ></InputSelectSmall>
                <Button
                    class="pl-0 pr-0"
                    :text="'Investor Relations'"
                    :variant="'text'"
                    :size="'xs'"
                    :link="{ name: 'investor-relations' }"
                ></Button>
                <Button
                    class="pl-0 pr-0"
                    :text="'Sell on Amazon'"
                    :variant="'text'"
                    :size="'xs'"
                    :link="{ name: 'cooperation' }"
                ></Button>
            </div>
        </section>
        <HeaderNavigation class="hidden lg:block"></HeaderNavigation>
        <section class="lg:hidden pt-2 px-3">
            <div class="flex justify-between items-start">
                <Logo></Logo>
                <div class="flex gap-2">
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
            <div class="flex gap-3 items-center mt-3 pr-1">
                <Button
                    @click="sidebarOpened = true"
                    class="text-c-orange"
                    :variant="'ghost'"
                    :size="'2xl'"
                    icon-name="radix-icons:hamburger-menu"
                ></Button>

                <input
                    type="text"
                    v-model="searchPhrase"
                    class="border border-c-skin w-full rounded-lg h-10 px-4 placeholder:text-gray-300 text-sm"
                    placeholder="Search"
                />
            </div>
        </section>
        <Sidebar :title="'Amazon'" v-model="sidebarOpened">
            <slot>
                <ListingFilterDropdown :title="'All'">
                    <div
                        v-for="department in departments"
                        class="text-sm text-c-black-txt items-center mb-6"
                    >
                        {{ department.name.en }}
                        <NuxtLink
                            class="text-xs text-c-gray block mt-1"
                            @click="sidebarOpened = false"
                            v-for="category in department.categories"
                            :key="category.id"
                            :to="{
                                name: 'products-category',
                                params: { category: category.slug },
                            }"
                        >
                            {{ category.name.en }}
                        </NuxtLink>
                    </div>
                </ListingFilterDropdown>
                <div class="flex flex-col gap-3 mt-3 text-c-gray">
                    <NuxtLink
                        :to="{ name: 'about' }"
                        @click="sidebarOpened = false"
                    >
                        About
                    </NuxtLink>
                    <NuxtLink
                        :to="{ name: 'privacy' }"
                        @click="sidebarOpened = false"
                    >
                        Privacy Policy
                    </NuxtLink>
                    <NuxtLink
                        :to="{ name: 'investor-relations' }"
                        @click="sidebarOpened = false"
                    >
                        Investor Relations
                    </NuxtLink>
                    <NuxtLink
                        :to="{ name: 'delivery' }"
                        @click="sidebarOpened = false"
                    >
                        Delivery
                    </NuxtLink>
                    <NuxtLink :to="{ name: 'newsletter' }">
                        Newsletter
                    </NuxtLink>
                    <NuxtLink
                        :to="{ name: 'careers' }"
                        @click="sidebarOpened = false"
                    >
                        Careers
                    </NuxtLink>
                    <NuxtLink
                        :to="{ name: 'cooperation' }"
                        @click="sidebarOpened = false"
                    >
                        Cooperation
                    </NuxtLink>
                </div>
            </slot>
        </Sidebar>
    </header>
</template>
