<script setup lang="ts">
interface Props {
    modelValue: Boolean;
    title: String;
}

const props = defineProps<Props>();
const emit = defineEmits(["update:modelValue"]);
const opened = ref(props.modelValue);

const attrs = useAttrs();
</script>

<template>
    <teleport to="body">
        <transition
            enter-active-class="animate-slideInLeft"
            leave-active-class="animate-slideOutLeft"
            appear
        >
            <div
                v-if="opened"
                class="fixed z-50 left-0 top-0 h-screen w-5/6 flex flex-col bg-white"
                v-bind="attrs"
            >
                <div
                    class="flex justify-between flex-row-reverse gap-3 py-3 px-5 items-center"
                >
                    <slot name="close-button">
                        <button
                            data-test="sidebar-close"
                            @click="opened = false"
                        >
                            <Icon
                                name="material-symbols:close"
                                class="text-xl"
                            ></Icon>
                        </button>
                    </slot>

                    <h3 v-if="title" class="text-lg font-medium text-c-black">
                        {{ title }}
                    </h3>
                    <slot name="head-addon" />
                </div>
                <div class="p-4 min-h-0 overflow-y-auto">
                    <slot name="default" />
                </div>
            </div>
        </transition>
        <transition
            enter-active-class="animate-fadeIn"
            leave-active-class="animate-fadeOut"
            appear
        >
            <div
                v-if="opened"
                class="fixed z-40 top-0 left-0 w-screen h-screen bg-black/50"
                data-test="sidebar-backdrop"
                @click="opened = false"
            />
        </transition>
    </teleport>
</template>

<style scoped>
@keyframes slideInLeft {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(0);
    }
}

@keyframes slideOutLeft {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-100%);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

.animate-slideInLeft {
    animation: slideInLeft 0.2s ease-out forwards;
}

.animate-slideOutLeft {
    animation: slideOutLeft 0.2s ease-in forwards;
}

.animate-fadeIn {
    animation: fadeIn 0.2s ease-out forwards;
}

.animate-fadeOut {
    animation: fadeOut 0.2s ease-in forwards;
}
</style>
