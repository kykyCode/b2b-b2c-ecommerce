<script setup lang="ts">
import AnimateHeight from "vue-animate-height";

interface Props {
    modelValue: boolean;
}

const props = defineProps<Props>();

const { data: departments } = await useMyFetch<Array<CatalogDepartment>>(
    "api/global/catalog"
);

const activeDepartment = ref<CatalogDepartment | null>(null);

const currentValue = useVModel<Boolean>(props);

const catalogRef = ref<HTMLElement | null>(null);

const height = ref<number | "auto">(0);

const toggleCatalog = (): void =>
    (height.value = height.value === 0 ? "auto" : 0);

const closeCatalog = (): void => {
    currentValue.value = false;
    setTimeout(() => {
        activeDepartment.value = null;
    }, 200);
};

onClickOutside(catalogRef, (): void => closeCatalog());

watch(currentValue, (): void => {
    toggleCatalog();
});
</script>

<template>
    <AnimateHeight
        :height="height"
        :duration="200"
        :easing="'ease-out'"
        @mouseleave="closeCatalog"
    >
        <div
            class="hidden lg:flex bg-c-skin-ligth shadow-c w-[80wv] max-h-[70vh]"
            ref="catalogRef"
        >
            <div
                class="rounded transition-all bg-c-skin-light py-6 overflow-y-auto scrollbar-custom"
            >
                <div class="flex-col">
                    <template
                        v-for="department in departments"
                        :key="department.key"
                    >
                        <CatalogListItem
                            @mouseover="activeDepartment = department"
                            :is-active="
                                activeDepartment &&
                                activeDepartment.key === department.key
                            "
                            :text="department.name.en"
                        ></CatalogListItem>
                    </template>
                </div>
            </div>
            <div :class="[{ 'p-8': activeDepartment }]" class="bg-white">
                <div
                    :class="activeDepartment ? 'toggle_to_contentsss' : ''"
                    class="contentsss bg-white xl:w-[50vw] 2xl:w-[70vw]"
                >
                    <div class="grid lg:grid-cols-3 gap-12">
                        <template
                            v-if="activeDepartment"
                            v-for="category in activeDepartment.categories"
                            :key="category.name.en"
                        >
                            <CatalogCategoryList
                                class="w-fit mb-1"
                                :category="category"
                            />
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AnimateHeight>
</template>

<style scoped>
.contentsss {
    width: 0px;
    opacity: 0;
    transition: width 0.2s ease-out, opacity 0.3s ease-in-out;
    transition-delay: 0s, 0.2s;
}

.toggle_to_contentsss {
    width: 50vw;
    opacity: 1;
}
</style>
