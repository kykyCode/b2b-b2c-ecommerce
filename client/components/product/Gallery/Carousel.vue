<script setup lang="ts">
interface Props {
    modelValue: number;
    images: Array<string>;
}

const props = defineProps<Props>();
const emit = defineEmits(["update:modelValue"]);

const currentImage = useVModel(props, "modelValue", emit);
</script>

<template>
    <div>
        <div class="bg-c-skin-light p-6 flex justify-evenly rounded-sm">
            <button
                v-for="(image, index) in images"
                @click="currentImage = index"
                class="h-24"
            >
                <img :src="image" alt="" class="h-full" />
            </button>
        </div>
    </div>
</template>
