<script setup lang="ts">
interface Props {
    modelValue: number;
    lastPage: number;
}

const props = defineProps<Props>();
const emit = defineEmits(["update:modelValue"]);
const currentValue = useVModel(props, "modelValue", emit);

type PageItem = number | { type: "ellipsis" };

const displayedPages = computed(() => {
    const pages: PageItem[] = [];
    const wingSpan = 2;

    if (props.lastPage <= 1 + wingSpan * 2 + 2) {
        for (let i = 1; i <= props.lastPage; i++) {
            pages.push(i);
        }
    } else {
        pages.push(1);
        if (currentValue.value > 1 + wingSpan + 1) {
            pages.push({ type: "ellipsis" });
        }
        const rangeStart = Math.max(2, currentValue.value - wingSpan);
        const rangeEnd = Math.min(
            props.lastPage - 1,
            currentValue.value + wingSpan
        );
        for (let i = rangeStart; i <= rangeEnd; i++) {
            pages.push(i);
        }
        if (currentValue.value < props.lastPage - wingSpan - 1) {
            pages.push({ type: "ellipsis" });
        }
        pages.push(props.lastPage);
    }
    return pages;
});
</script>

<template>
    <div
        class="text-c-gray py-4 justify-center flex items-center gap-6 text-lg font-medium"
    >
        <Button
            class="mr-4"
            icon-name="material-symbols-light:keyboard-double-arrow-left"
            variant="ghost"
            size="2xl"
            @click="currentValue = Math.max(1, currentValue - 1)"
        ></Button>
        <button
            v-for="page in displayedPages"
            :key="typeof page === 'number' ? page : 'ellipsis'"
            :class="{
                'font-semibold text-c-orange': currentValue == page,
                'cursor-default': typeof page !== 'number',
            }"
            @click="typeof page === 'number' && (currentValue = page)"
        >
            {{ typeof page === "number" ? page : "..." }}
        </button>
        <Button
            class="ml-4"
            icon-name="material-symbols-light:keyboard-double-arrow-right"
            variant="ghost"
            size="2xl"
            @click="currentValue = Math.min(total, currentValue + 1)"
        ></Button>
    </div>
</template>
