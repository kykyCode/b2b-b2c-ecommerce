<script setup lang="ts">
interface Props {
    images: Array<string>;
    isFavorite: boolean;
}

defineProps<Props>();

const currentImage = ref<number>(0);
</script>

<template>
    <div>
        <ProductGalleryMain
            v-model="currentImage"
            :images="images"
            :is-favorite="isFavorite"
        />
        <ProductGalleryCarousel
            v-model="currentImage"
            :images="images"
            class="mt-5 hidden lg:block"
        />
    </div>
</template>
