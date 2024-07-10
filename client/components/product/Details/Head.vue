<script setup lang="ts">
interface Props {
    name: string;
    ratingValue: number;
    reviewsCount: number;
    answeredQuestionsCount?: number;
    desc: string;
    lastPieces: Boolean;
}

defineProps<Props>();
</script>

<template>
    <div>
        <div class="flex flex-wrap gap-2 mt-6 mb-2">
            <Badge :size="'sm'">
                Bestseller
                <Icon name="mdi:shopping" />
            </Badge>

            <Badge :size="'sm'" :variant="'light'">
                Sale
                <Icon name="ic:outline-discount" />
            </Badge>

            <Badge :size="'sm'" :variant="'gray'" v-if="lastPieces">
                Last pieces
                <Icon name="material-symbols:hourglass-bottom-rounded" />
            </Badge>
        </div>
        <h2 class="text-lg lg:text-3xl font-semibold text-c-black pr-12 mt-4">
            {{ name }}
        </h2>
        <p class="text-sm text-c-gray mt-4 leading-4">{{ desc }}</p>
        <Rating
            class="mt-6"
            :value="ratingValue"
            :reviews-count="reviewsCount"
            :answered-questions-count="answeredQuestionsCount"
        />
    </div>
</template>
