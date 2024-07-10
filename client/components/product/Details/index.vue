<script setup lang="ts">
interface Props {
    product: Product;
}

defineProps<Props>();

const activeSection = ref("product-information");
</script>

<template>
    <div>
        <ProductDetailsSectionSelector
            class="my-4 lg:my-0"
            v-model="activeSection"
        ></ProductDetailsSectionSelector>

        <transition name="slide-fade" mode="out-in">
            <div v-if="activeSection === 'product-information'" class="mt-3">
                <ProductDetailsInformationSection :product="product" />
            </div>
            <div v-else-if="activeSection === 'reviews'" class="mt-5">
                <ProductDetailsReviewsSection :reviews="product.reviews" />
            </div>
        </transition>
    </div>
</template>

<style scoped>
@keyframes slideIn {
    from {
        transform: translateX(10px);
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
        transform: translateX(-10px);
        opacity: 0;
    }
}

.slide-fade-enter-active {
    animation: slideIn 0.3s ease;
}

.slide-fade-leave-active {
    animation: slideOut 0.3s ease;
}
</style>
