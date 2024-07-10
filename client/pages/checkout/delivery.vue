<script setup lang="ts">
definePageMeta({
    checkoutStep: "delivery",
});

const { cart, setCart } = useCartStore();
const { user } = useUserStore();

const tempForm = {
    first_name: "",
    last_name: "",
    email: "",
    phone_number: "",
    address_line_1: "",
    address_line_2: "",
    city: "",
    zip: "",
    country: "",
};

const form = ref<Address>(
    cart.value.address
        ? { ...cart.value.address }
        : user.value.default_address_data
        ? { ...user.value.default_address_data }
        : { ...tempForm }
);

const validateField = (value: string, rules: string[]) => {
    return rules.every((rule) => {
        if (rule === "required") {
            return !!value.trim();
        }
        if (rule === "email") {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(value);
        }
        return true;
    });
};

const isFormValid = computed(() => {
    return (
        validateField(form.value.first_name, ["required"]) &&
        validateField(form.value.last_name, ["required"]) &&
        validateField(form.value.email, ["required", "email"]) &&
        validateField(form.value.address_line_1, ["required"]) &&
        validateField(form.value.city, ["required"]) &&
        validateField(form.value.zip, ["required"]) &&
        validateField(form.value.country, ["required"])
    );
});

watch(
    form,
    (formValue) => {
        setCart({ ...cart.value, address: { ...formValue } });
    },
    { deep: true }
);

provide("isFormValid", isFormValid);
provide("address", form);
</script>

<template>
    <div>
        <h2 class="text-2xl lg:text-4xl text-c-black-txt font-semibold">
            Delivery
        </h2>
        <div class="flex flex-wrap lg:flex-nowrap gap-16 mt-6 lg:mt-12">
            <div class="w-full lg:w-3/4">
                <div class="flex flex-col gap-6">
                    <InputText
                        v-model="form.first_name"
                        :label="'First Name *'"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.last_name"
                        :label="'Last Name *'"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.email"
                        :label="'Email *'"
                        :rules="['required', 'email']"
                    />
                    <InputText
                        v-model="form.phone_number"
                        :label="'Phone number (optional)'"
                    />
                    <InputText
                        v-model="form.address_line_1"
                        :label="'Address Line 1 *'"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.address_line_2"
                        :label="'Address Line 2 (optional)'"
                    />
                    <InputText
                        v-model="form.city"
                        :label="'City *'"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.zip"
                        :label="'Zip *'"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.country"
                        :label="'Country *'"
                        :rules="['required']"
                    />
                </div>
            </div>
            <CheckoutSummary class="w-full lg:w-1/4"></CheckoutSummary>
        </div>
    </div>
</template>
