<script setup lang="ts">
interface Props {}

defineProps<Props>();

const { user } = useUserStore();
</script>

<template>
    <div class="my-auto">
        <div class="flex gap-4 items-center w-full lg:w-fit">
            <img
                :src="user.avatar"
                class="rounded-full shadow-c w-16 h-16 shrink-0 object-cover"
                loading="lazy"
            />
            <div class="leading-5 font-medium text-c-black-txt">
                <div class="text-lg lg:text-base whitespace-nowrap">
                    Hi, {{ user.first_name }} {{ user.last_name }}
                </div>
                <div class="lg:text-xs font-normal">
                    {{ user.email }}
                </div>
            </div>
        </div>
    </div>
</template>
