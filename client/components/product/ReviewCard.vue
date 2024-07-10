<script setup lang="ts">
interface Props {
    review: Review
}

defineProps<Props>()


const comment = ref(
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat interdum tellus quis dapibus. Vivamus ligula libero, pretium quis dictum non, semper vel ante. Cras commodo metus id pulvinar faucibus. Vivamus congue ante metus, quis venenatis diam hendrerit eget. Quisque id faucibus metus, vitae blandit augue."
);
</script>

<template>
    <div class="rounded-xl p-6 border border-gray-200 shadow">
        <div class="flex items-center gap-7">
            <img
                src="/images/demo/ceo-demo.png"
                width="60"
                class="rounded-full shadow border border-gray-100"
            ></img>
            <div>
                <div class="text-black font-medium">{{ review.user.name}}</div>
                <div class="text-c-gray font-medium text-xs -mt-1">
                    @tag-in-progress
                </div>
            </div>
        </div>
        <Rating class="mt-2" :value="Math.floor(review.rating)" :label="`${Math.floor(review.rating)}.0`"></Rating>
        <div class="text-xs leading-4 tracking-wide text-c-black-txt mt-1">
            <span>{{ comment.slice(0, 110) }}</span>
            <span v-if="comment.length > 110">... </span>
            <button
                class="tracking-tight font-medium text-c-orange text-sm flex gap-2 items-center mt-2"
            >
                read more
                <Icon name="material-symbols:reviews-outline-rounded"></Icon>
            </button>
        </div>
    </div>
</template>
