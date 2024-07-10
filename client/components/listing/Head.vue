<script setup lang="ts">
interface Props {
    category: Category;
    productsCount?: number;
}

const props = defineProps<Props>();

const items = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    {
        name: props.category.name.en,
    },
]);
</script>

<template>
    <div class="flex flex-wrap lg:flex-nowrap items-end lg:gap-8">
        <div
            class="w-full lg:w-1/5 text-2xl lg:text-3xl text-c-black-txt font-semibold tracking-tight order-2 lg:order-1 mt-4 lg:mt-0"
        >
            {{ category.name.en }}
            <div
                v-if="productsCount"
                class="text-xs text-c-gray tracking-wide mt-4 font-normal lg:hidden"
            >
                {{ productsCount }} products
            </div>
        </div>
        <div
            class="w-full lg:w-4/5 flex gap-8 text-lg text-c-gray lg:mt-4 mt-0 order-1 lg:order-2 px-4 lg:px-0"
        >
            <Breadcrumbs :items="items"></Breadcrumbs>
        </div>
    </div>
</template>
