<script setup lang="ts">
interface Props {
    modelValue: number;
}

const props = defineProps<Props>();

const selected = useVModel(props);

const topPosition = computed(() => {
    switch (selected.value) {
        case 0:
            return "0%";
        case 1:
            return "25%";
        case 2:
            return "50%";
        case 3:
            return "75%";
        default:
            return "0%";
    }
});

const marginTop = computed(() => {
    switch (selected.value) {
        case 0:
            return "0";
        case 1:
            return "10px";
        case 2:
            return "19px";
        case 3:
            return "29px";
        default:
            return "0";
    }
});
</script>

<template>
    <div class="relative">
        <div class="p-[21px] flex flex-col gap-20">
            <button
                @click="selected = index"
                v-for="index in 4"
                class="h-1.5 w-1.5 bg-c-brown rounded-full transition-all duration-200 hover:bg-c-orange"
                :class="[{ 'bg-c-orange': selected === index - 1 }]"
            ></button>
        </div>
        <div
            class="h-12 w-12 border border-c-orange rounded-full flex justify-center items-center absolute transition-all duration-500 z-10"
            :style="{ top: topPosition, 'margin-top': marginTop }"
        ></div>
    </div>
</template>
