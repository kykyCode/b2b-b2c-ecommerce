<script setup lang="ts">
import type { RouteLocationRaw } from "vue-router";

interface Props {
    name: String;
    isActive: Boolean;
    to?: RouteLocationRaw;
}

defineProps<Props>();
</script>

<template>
    <NuxtLink
        class="hover:text-c-black-txt font-medium transition-all duration-75 text-xs lg:text-sm whitespace-nowrap"
        :class="isActive ? 'font-semibold text-c-black-txt' : 'text-c-gray'"
        :to="to"
    >
        <span class="hidden lg:block">
            {{ name }}
        </span>
        <span class="block lg:hidden">
            <template v-if="name.length > 14">
                {{ name.slice(0, 14) }}...
            </template>
            <template v-else>
                {{ name }}
            </template>
        </span>
    </NuxtLink>
</template>
