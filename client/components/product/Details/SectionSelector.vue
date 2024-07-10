<script setup lang="ts">
import { ref, onMounted, defineProps, defineEmits, computed } from "vue";

interface Section {
    name: string;
    key: string;
    tempPosition: number;
    width: number;
}

interface Props {
    modelValue: string;
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: "product-information",
});

const emit = defineEmits(["update:modelValue"]);

const currentSection = useVModel(props, "modelValue", emit);

const sections = ref<Array<Section>>([
    {
        name: "Product Information",
        key: "product-information",
        tempPosition: 0,
        width: 160,
    },
    {
        name: "Reviews",
        key: "reviews",
        tempPosition: 1,
        width: 55,
    },
    {
        name: "FAQ",
        key: "faq",
        tempPosition: 2,
        width: 50,
    },
]);

const currentSectionElement = ref<HTMLElement | null>(null);

onMounted(() => {
    const initialElement = document.getElementById(props.modelValue);
    if (initialElement) {
        currentSectionElement.value = initialElement as HTMLElement;
    }
});

function handleButtonClick(sectionKey: string, event: MouseEvent) {
    currentSection.value = sectionKey;
    currentSectionElement.value = event.target as HTMLElement;
}

const currentSectionPosition = computed(() => {
    let section = sections.value.find(
        (section: Section) => section.key === currentSection.value
    );

    if (!section) {
        return 0;
    }

    return section.tempPosition;
});

const previousSectionsWidthSum = computed(() => {
    let sum = 0;
    for (let i = 0; i < currentSectionPosition.value; i++) {
        sum += sections.value[i].width;
    }
    return sum;
});

const { width } = useWindowSize();
</script>

<template>
    <div class="flex gap-5 lg:gap-8 relative h-fit">
        <button
            v-for="section in sections"
            :id="section.key"
            @click="handleButtonClick(section.key, $event)"
            :key="section.key"
            class="text-sm lg:text-base font-semibold relative h-fit whitespace-nowrap transition-all"
            :class="
                currentSection == section.key
                    ? 'text-c-black-text border-c-orange border-b-2 lg:border-none'
                    : 'text-c-skin hover:text-c-black-txt'
            "
        >
            {{ section.name }}
        </button>

        <div
            v-if="currentSectionElement"
            :style="`width: ${
                currentSectionElement.clientWidth
            }px; transform: translateX(${
                previousSectionsWidthSum + currentSectionPosition * 42.5
            }px)`"
            class="hidden lg:block absolute -bottom-1 left-0 bg-c-orange h-0.5 w-full transition-all duration-300"
        ></div>
    </div>
</template>
