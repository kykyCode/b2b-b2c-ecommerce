<script setup lang="ts">
interface Props {
    value?: string | number | boolean | object;
    modelValue?: boolean | string | number | Array<any> | object | null;
    name?: string;
    disabled?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: undefined,
    value: undefined,
    name: undefined,
    disabled: false,
});

const currentValue = useVModel(props, "modelValue") as Ref<
    boolean | string | number | Array<any> | object | null
>;
</script>

<template>
    <label :for="name" class="flex items-center gap-3">
        <input
            :id="name"
            :name="name"
            v-model="currentValue"
            :value="value"
            :disabled="disabled"
            type="checkbox"
            class="peer hidden shrink-0"
        />
        <span
            class="h-4 w-4 lg:h-5 lg:w-5 border bg-white rounded peer-checked:border-none peer-checked:bg-c-orange transition-all duration-150 cursor-pointer flex items-center justify-center"
        >
            <Icon
                name="ic:baseline-check"
                class="text-white text-2xl hidden peer-checked:block"
            ></Icon>
        </span>
        <slot></slot>
    </label>
</template>
