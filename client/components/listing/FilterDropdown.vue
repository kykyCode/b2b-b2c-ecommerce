<script setup lang="ts">
import AnimateHeight from "vue-animate-height";

interface Props {
    title: string;
}

defineProps<Props>();

const isOpened = ref(false);

const height = ref<string | number>("auto");
const toggle = () => (height.value = height.value === 0 ? "auto" : 0);

watch(isOpened, (newVal) => {
    toggle();
});
</script>

<template>
    <div>
        <button
            class="flex justify-between items-center w-full text-lg text-c-black-txt"
            @click="isOpened = !isOpened"
        >
            <div class="font-medium text-lg text-c-black-txt">{{ title }}</div>
            <Button
                :class="[{ '-rotate-180 -translate-x-2 ': isOpened }]"
                :icon-name="'bytesize:chevron-bottom'"
                :variant="'ghost'"
            ></Button>
        </button>
        <AnimateHeight
            :height="height"
            :duration="200"
            :easing="'ease-out'"
            :animate-opacity="true"
        >
            <div class="py-2 pr-13px">
                <div
                    class="py-4 max-h-96 overflow-y-auto scrollbar-custom pr-2"
                >
                    <slot></slot>
                </div>
            </div>
        </AnimateHeight>
    </div>
</template>
