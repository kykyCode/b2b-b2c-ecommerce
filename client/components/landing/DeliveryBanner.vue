<template>
    <div class="p-8 lg:p-16 flex flex-wrap lg:flex-nowrap bg-c-skin-light">
        <div
            class="flex flex-col gap-6 justify-center w-fulllg:w-1/2 text-center lg:text-left"
        >
            <div class="text-c-gray text-sm">Discover Amazon</div>
            <div class="text-xl lg:text-5xl font-extrabold">
                AMAZON DELIVERS TO YOU
            </div>
            <div>
                Worldwide shipping. We ship to over 100 countries and regions,
                right to your doorstep.
            </div>
            <Button
                class="mt-6 mx-auto lg:mx-0"
                :variant="'secondary'"
                :text="'View more'"
                :size="'lg'"
                :link="{ name: 'delivery' }"
            ></Button>
        </div>
        <div class="flex justify-center w-full lg:w-1/2 mt-16 lg:mt-0">
            <img
                src="/images/demo/dog_box.webp"
                alt=""
                class="mx-auto"
                width="384"
                loading="lazy"
            />
        </div>
    </div>
</template>
