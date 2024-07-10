<script setup lang="ts">
interface Props {
    reviews: Review[];
}

defineProps<Props>();
</script>

<template>
    <div
        class="relative after:absolute after:bottom-0 after:left-0 after:h-16 after:w-full after:content-[''] after:pointer-events-none after:bg-gradient-to-b after:from-transparent after:to-white"
    >
        <div class="max-h-[720px] overflow-y-auto scrollbar-custom relative">
            <div
                class="pr-1 lg:pr-4 grid grid-cols-1 lg:grid-cols-2 gap-3 pb-6"
            >
                <ProductReviewCard
                    v-for="review in reviews"
                    :review="review"
                ></ProductReviewCard>
            </div>
        </div>
    </div>
</template>
