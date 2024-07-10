<script setup lang="ts">
interface Props {
    variant?: string;
    size?: string;
    closeBtn: boolean;
}

withDefaults(defineProps<Props>(), {
    variant: "primary",
    size: "base",
    closeBtn: false,
});

interface EmitEvents {
    (event: "closeClicked"): void;
}

const emits = defineEmits<EmitEvents>();
</script>

<template>
    <div
        class="rounded-lg shadow-sm w-fit flex items-center gap-2"
        :class="{
            'bg-c-orange text-white': variant === 'primary',
            'bg-c-gray text-white': variant === 'gray',
            'bg-c-skin-light text-c-gray': variant === 'light',
            'px-3 py-1 text-xs font-medium': size === 'sm',
            'px-2 py-1 text-sm  font-semibold': size === 'base',
            'px-2.5 py-2 text-sm  font-semibold': size === 'lg',
        }"
    >
        <slot></slot>
        <button
            class="text-xl -mt-1.5"
            v-if="closeBtn"
            @click="emits('closeClicked')"
        >
            <Icon name="material-symbols:close-rounded"></Icon>
        </button>
    </div>
</template>
