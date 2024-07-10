<script>
export default {};
</script>

<template>
    <div class="min-h-[580px]">
        <div class="flex flex-col gap-8 pt-8 mt-16 lg:mt-32">
            <Logo class="mx-auto"></Logo>
            <div class="text-center">
                <h1 class="text-3xl font-semibold">
                    Thank You for Your Order!
                </h1>
                <h2 class="text-xl font-medium mt-6">
                    We appreciate your business.
                </h2>
                <p class="mt-2 text-c-gray lg:w-1/3 mx-auto">
                    Your order has been received and is being processed. You can
                    pay for your order in the user panel.
                </p>
            </div>
            <div class="flex gap-4 mx-auto">
                <Button
                    :link="{ name: 'dashboard-orders' }"
                    :text="'Pay now !'"
                    :variant="'primary'"
                    :size="'lg'"
                    class="w-full lg:w-60"
                ></Button>
            </div>
        </div>
    </div>
</template>
