<script setup lang="ts">
interface Props {
    modelValue: number;
    images: Array<string>;
    isFavorite: boolean;
}

const props = defineProps<Props>();
const emit = defineEmits(["update:modelValue"]);

const currentImage = useVModel(props, "modelValue", emit);

const incrementImage = (): void => {
    if (currentImage.value < props.images.length - 1) {
        currentImage.value += 1;
    }
};

const decrementImage = (): void => {
    if (currentImage.value !== 0) {
        currentImage.value -= 1;
    }
};

const addToFavorites = inject("addToFavorites") as () => void;
const removeFromFavorites = inject("removeFromFavorites") as () => void;

const toggleFavorite = () => {
    props.isFavorite ? removeFromFavorites() : addToFavorites();
};
</script>

<template>
    <div class="bg-c-skin-light p-12 lg:p-36 relative rounded-sm">
        <transition name="slide-fade" mode="out-in">
            <img
                :key="images[currentImage]"
                :src="images[currentImage]"
                alt=""
            />
        </transition>

        <Button
            @click="incrementImage"
            class="absolute right-1 lg:right-5 rounded-full top-1/2 -translate-y-1/2"
            :variant="'ghost'"
            icon-name="material-symbols-light:chevron-right"
            :size="'2xl'"
            :class="{
                'pointer-events-none opacity-20':
                    currentImage == images.length - 1,
            }"
        ></Button>

        <Button
            @click="decrementImage"
            class="absolute left-1 lg:left-5 top-1/2 -translate-y-1/2"
            :variant="'ghost'"
            icon-name="material-symbols-light:chevron-left"
            :size="'2xl'"
            :class="{ 'pointer-events-none opacity-20': currentImage == 0 }"
        ></Button>

        <Button
            @click="toggleFavorite"
            class="absolute right-0 lg:right-3 top-5 lg:top-8 -translate-y-1/2 text-c-orange"
            :variant="'ghost'"
            :icon-name="isFavorite ? 'line-md:heart-filled' : 'line-md:heart'"
            :size="'2xl'"
        ></Button>

        <div class="absolute bottom-6 lg:bottom-12 left-1/2 -translate-x-1/2">
            <div class="flex gap-12 relative">
                <button
                    v-for="(item, index) in images.slice(0, 10)"
                    @click="currentImage = index"
                    :class="{ 'bg-c-orange': currentImage == index }"
                    class="h-1 w-1 rounded-full bg-c-gray"
                />

                <div
                    :style="`transform: translateX(${currentImage * 52}px)`"
                    class="h-4 w-4 lg:h-10 lg:w-10 border border-c-orange absolute -bottom-[6px] -left-[6px] lg:-bottom-[17px] lg:-left-[18px] rounded-full transition-all duration-300 delay-75 ease-in-out"
                ></div>
            </div>
        </div>
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
    animation: slideIn 0.5s ease;
}

.slide-fade-leave-active {
    animation: slideOut 0.2s ease;
}
</style>
