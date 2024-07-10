<script setup lang="ts">
interface Props {
    variants: Array<Product>;
}

defineProps<Props>();

const setSelectedVariant =
    inject<(variant: Array<Product>) => void>("setSelectedVariant");

const selectedVariant = inject<Ref<Product>>("selectedVariant");

const handleVariantChange = (variant: Product) => {
    if (setSelectedVariant) {
        setSelectedVariant(variant);
    } else {
        console.error("setSelectedVariant is not defined");
    }
};
</script>

<template>
    <div class="flex flex-wrap gap-4">
        <button
            v-for="item in variants"
            :key="JSON.stringify(item)"
            @click="handleVariantChange(item)"
            class="relative"
        >
            <img :src="item.main_image" alt="" class="h-20 w-20" />
            <div
                v-if="selectedVariant && selectedVariant.id === item.id"
                class="absolute right-0 bottom-0 h-6 w-6 bg-c-orange rounded-full shadow-sm"
            >
                <Icon name="ic:baseline-check" class="text-white"></Icon>
            </div>
        </button>
    </div>
</template>
