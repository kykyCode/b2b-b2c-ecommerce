<script setup lang="ts">
interface Props {
    category: CatalogCategory;
}

const props = defineProps<Props>();
</script>

<template>
    <div class="flex flex-col gap-1">
        <NuxtLink
            :to="{
                name: 'products-category',
                params: { category: category.slug },
            }"
            class="font-semibold text-sm whitespace-nowrap text-left"
        >
            {{ category.name.en }}
        </NuxtLink>
        <Button
            class="w-fit font-semibold text-c-black-txt mt-2"
            :icon-name="'streamline:interface-arrows-right-arrow-right-keyboard'"
            :icon-side="'right'"
            :variant="'ghost'"
            :text="'View more'"
            :size="'xs'"
        ></Button>
    </div>
</template>
