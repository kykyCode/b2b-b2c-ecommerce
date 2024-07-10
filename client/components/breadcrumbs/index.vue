<script setup lang="ts">
interface Props {
    items: Array<BreadcrumbsItem>;
}

defineProps<Props>();
</script>

<template>
    <div class="flex gap-4 items-center">
        <template v-for="(item, index) in items" :key="item.name">
            <BreadcrumbsLink
                :name="item.name"
                :to="index < items.length - 1 ? item.to : undefined"
                :is-active="index >= items.length - 1"
            />
            <Icon
                v-if="index < items.length - 1"
                class="text-sm lg:text-sm text-c-gray"
                name="mage:chevron-right"
            ></Icon>
        </template>
    </div>
</template>
