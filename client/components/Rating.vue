<script setup lang="ts">
interface Props {
    value: number;
    reviewsCount?: number;
    maxValue?: number;
    label?: string;
    answeredQuestionsCount?: number;
}

withDefaults(defineProps<Props>(), {
    maxValue: 5,
});
</script>

<template>
    <div class="flex items-center">
        <template v-for="item in Math.floor(value)">
            <Icon
                v-if="item <= maxValue"
                name="bx:bxs-star"
                class="text-yellow-500"
                size="16px"
            ></Icon>
        </template>
        <Icon
            v-if="value - Math.floor(value) >= 0.5"
            name="bxs:star-half"
            class="text-yellow-500"
            size="16px"
        ></Icon>
        <Icon
            v-for="item in maxValue - Math.ceil(value)"
            name="bx:star"
            class="text-yellow-500"
            size="16px"
        ></Icon>
        <div v-if="label" class="text-sm text-c-gray ml-2 mt-0.5">
            {{ label }}
        </div>
        <button
            v-if="reviewsCount"
            class="text-c-gray ml-3 text-xs hover:text-c-black-txt hover:underline transition-all duration-75 whitespace-nowrap"
        >
            {{ reviewsCount }} reviews
            <span v-if="answeredQuestionsCount">
                | {{ answeredQuestionsCount }} answered questions</span
            >
        </button>
    </div>
</template>
