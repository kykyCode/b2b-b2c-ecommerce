<script setup lang="ts">
interface Props {
    value?: string | number | boolean;
    modelValue?: boolean | string | number | object | null;
    name?: string;
    disabled?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: undefined,
    value: undefined,
    name: undefined,
    disabled: false,
});

const currentValue = useVModel(props, "modelValue", undefined, {
    passive: true,
}) as Ref<boolean | string | number | object | null>;

const slots = useSlots();

const isSlotEmpty = computed(() => !slots.default);
</script>

<template>
    <label :for="name" class="flex items-center gap-3">
        <input
            :id="name"
            :name="name"
            :value="value"
            :disabled="disabled"
            type="radio"
            class="peer w-0"
            v-model="currentValue"
        />
        <span
            class="h-6 w-6 border-2 border-c-gray-light rounded-full bg-white peer-checked:border-c-orange cursor-pointer flex items-center justify-center transition-all duration-75"
        >
            <span
                class="h-4 w-4 rounded-full bg-white flex items-center justify-center"
            >
                <span
                    class="h-3 w-3 rounded-full bg-c-orange"
                    :class="currentValue == value ? 'block' : 'hidden'"
                ></span>
            </span>
        </span>
        <slot></slot>
    </label>
</template>
