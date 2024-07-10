<script setup lang="ts">
interface Props {
    hideButton?: boolean;
}

defineProps<Props>();
</script>

<template>
    <div
        class="text-center lg:text-left p-6 lg:px-16 lg:py-8 flex bg-c-skin-light flex-wrap lg:flex-nowrap"
    >
        <div class="flex flex-col gap-6 justify-center w-full lg:w-1/2">
            <div class="text-c-gray text-sm">Discover Amazon</div>
            <div class="text-2xl lg:text-5xl font-extrabold">
                SUBSCRIBE TO THE NEWS
            </div>
            <div>
                Be aware of all discounts and baragains! Dont't miss your
                benefit!
            </div>
            <Button
                v-if="!hideButton"
                class="mt-6 mx-auto lg:mx-0"
                :variant="'secondary'"
                :text="'Subscribe'"
                :size="'lg'"
                :link="{ name: 'newsletter' }"
            ></Button>
        </div>
        <div class="w-full lg:w-1/2 mt-12 lg:mt-0">
            <img
                src="~/assets/images/demo/lady-happy-png.png"
                alt=""
                class="-mb-6 lg:-mb-8 lg:ml-24"
                loading="lazy"
            />
        </div>
    </div>
</template>
