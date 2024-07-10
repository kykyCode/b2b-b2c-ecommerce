<script setup lang="ts">
interface Props {
    modelValue: string;
    placeholder?: string;
    iconName?: string;
    options?: Array<string>;
}

const props = defineProps<Props>();

const currentValue = useVModel(props, "modelValue") as Ref<string>;

const listOpened = ref<boolean>(false);

const target = ref<HTMLElement | null>(null);

onClickOutside(target, () => (listOpened.value = false));
</script>

<template>
    <div class="relative">
        <div class="flex gap-2 items-center">
            <Icon
                v-if="iconName"
                :name="iconName"
                class="text-c-gray"
                @click="listOpened = !listOpened"
            />
            <button
                class="flex gap-2 items-center white"
                @click="listOpened = !listOpened"
            >
                <span class="text-sm text-c-gray w-fit whitespace-nowrap">
                    {{ currentValue ?? placeholder }}
                </span>
                <Icon name="bytesize:chevron-bottom" size="10px"></Icon>
            </button>
        </div>
        <div
            v-if="listOpened"
            ref="target"
            class="flex flex-col gap-2 absolute top-6 left-0 min-w-32 bg-white text-sm text-c-gray p-3 text-left rounded-xl shadow-c"
        >
            <button
                v-for="option in props.options"
                :key="option"
                @click="currentValue = option"
                class="hover:text-black transition-all w-fit"
                :class="{ 'text-black': currentValue === option }"
            >
                {{ option }}
            </button>
        </div>
    </div>
</template>
