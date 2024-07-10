<script setup lang="ts">
const route = useRoute();

const { data: department } = await useMyFetch<Department>(
    `api/departments/${route.params.department}`
);
</script>

<template>
    <div class="pb-32">
        <h1 class="text-4xl font-semibold text-c-black-txt mt-8">
            {{ department.name.en }} Department
        </h1>
        <div class="flex flex-col gap-16 mt-12">
            <DepartmentCard :department="department" :key="department.id" />
        </div>
    </div>
</template>
