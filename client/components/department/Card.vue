<script setup lang="ts">
interface Props {
    department: Department;
}

defineProps<Props>();
</script>

<template>
    <div>
        <section
            class="bg-c-skin-light rounded-sm p-12 flex items-center gap-20"
        >
            <img class="image" :src="department.main_image" alt="" />
            <div>
                <div class="text-5xl text-c-black-txt font-extrabold">
                    {{ department.name.en }}
                </div>
                <div class="text-lg text-c-black-txt mt-2">
                    {{ department.description.en }}
                </div>
            </div>
        </section>
        <section class="flex gap-4 mt-4 w-full">
            <NuxtLink
                v-for="category in department.categories"
                :to="{
                    name: 'products-category',
                    params: { category: category.slug },
                }"
                class="rounded-sm bg-c-skin-light hover:shadow-c font-medium px-16 py-6 flex-1 text-center transition-all"
            >
                {{ category.name.en }}
            </NuxtLink>
        </section>
    </div>
</template>
<style scoped>
.image {
    max-width: 400px;
}
</style>
