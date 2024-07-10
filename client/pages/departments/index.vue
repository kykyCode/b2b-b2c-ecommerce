<script setup lang="ts">
interface Props {}

defineProps<Props>();

const { data: departments } = await useMyFetch<Array<Department>>(
    "api/departments"
);
</script>

<template>
    <div>
        <h1 class="text-4xl font-semibold text-c-black-txt mt-8">
            Departments
        </h1>
        <div class="flex flex-col gap-16 mt-12">
            <DepartmentCard
                v-for="department in departments"
                :department="department"
                :key="department.id"
            />
        </div>
    </div>
</template>
