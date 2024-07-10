<template>
    <footer class="bg-c-orange-light">
        <div class="container mx-auto px-2 pb-4">
            <div
                class="bg-c-orange-light py-12 px-6 lg:px-24 gap-8 grid grid-cols-1 lg:grid-cols-4 xl:grid-cols-5 text-black-txt text-sm rounded-sm text-center lg:text-left"
            >
                <div class="mx-auto lg:mx-0">
                    <Logo />
                </div>

                <div>
                    <h3 class="font-bold">Get to Know Us</h3>
                    <ul class="flex flex-col gap-1 mt-2">
                        <li>
                            <NuxtLink :to="{ name: 'about' }"
                                >About Amazon</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'privacy' }"
                                >Privacy Policy</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'delivery' }"
                                >Delivery</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'newsletter' }"
                                >Newsletter</NuxtLink
                            >
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold">Make money with us</h3>
                    <ul class="flex flex-col gap-1 mt-2">
                        <li>
                            <NuxtLink :to="{ name: 'careers' }"
                                >Careers</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'cooperation' }"
                                >Cooperation</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'investor-relations' }"
                                >Investor Relations</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'newsletter' }"
                                >Subscribe</NuxtLink
                            >
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold">Let us help You</h3>
                    <ul class="flex flex-col gap-1 mt-2">
                        <li>
                            <NuxtLink :to="{ name: 'about' }"
                                >About Amazon</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'privacy' }"
                                >Privacy Policy</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'delivery' }"
                                >Delivery</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'rules' }"
                                >Conditions of use</NuxtLink
                            >
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold">Contents</h3>
                    <ul class="flex flex-col gap-1 mt-2">
                        <li>
                            <NuxtLink :to="{ name: 'cooperation' }"
                                >Cooperation</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'investor-relations' }"
                                >Investor Relations</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'newsletter' }"
                                >Subscribe</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'about' }"
                                >About Amazon</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'privacy' }"
                                >Privacy Policy</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'delivery' }"
                                >Delivery</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'newsletter' }"
                                >Newsletter</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink :to="{ name: 'careers' }"
                                >Careers</NuxtLink
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rounded-sm mt-4 lg:px-36 py-6">
                <div class="flex justify-between flex-wrap lg:flex-nowrap">
                    <div
                        class="flex gap-2 w-full lg:gap-12 text-sm flex-wrap lg:flex-nowrap text-center lg:text-left"
                    >
                        <NuxtLink
                            :to="{ name: 'rules' }"
                            class="w-full lg:w-auto"
                            >Conditions of use</NuxtLink
                        >
                        <NuxtLink
                            :to="{ name: 'privacy' }"
                            class="w-full lg:w-auto"
                            >Privacy notice</NuxtLink
                        >
                        <NuxtLink
                            :to="{ name: 'cooperation' }"
                            class="w-full lg:w-auto"
                            >Cooperation</NuxtLink
                        >
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
