<script setup>
const { items, dismiss } = useToasts();
</script>

<template>
    <div
        class="fixed z-[100] bottom-0 mb-2 w-full min-w-64 flex flex-col items-center gap-4 -translate-y-4"
        data-test="toasts"
    >
        <transition-group
            name="toast"
            tag="div"
            enter-active-class="toast-fade-slide-in"
            leave-active-class="toast-fade-slide-out"
            appear
        >
            <ToastsItem
                v-for="item in items"
                :key="item"
                v-bind="item"
                class="max-w-2xl cursor-pointer"
                @click="dismiss(item)"
            />
        </transition-group>
    </div>
</template>

<style scoped>
@keyframes fadeSlideIn {
    0% {
        opacity: 0;
        transform: translateY(150%);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeSlideOut {
    0% {
        opacity: 1;
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        transform: translateY(150%);
    }
}

.toast-fade-slide-in {
    animation: fadeSlideIn 0.2s ease-in-out both;
}

.toast-fade-slide-out {
    animation: fadeSlideOut 0.2s ease-in-out both;
}
</style>
