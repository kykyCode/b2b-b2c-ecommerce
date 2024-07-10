<script setup lang="ts">
definePageMeta({
    step: "profile",
    middleware: ["auth"],
});

const { user } = useUserStore();
const { data: departments } = await useMyFetch<Department[]>("api/departments");
const { data: userDepartments } = await useMyFetch<Department[]>(
    "api/user/departments"
);

const form = ref<Address>(getDefaultForm(user.value));
const selectedDepartments = ref<number[]>(
    getUserDepartmentIds(userDepartments.value)
);

function getDefaultForm(user: User | null): Address {
    if (user && user.id) {
        return { ...user.default_address_data, email: user.email };
    }
    return {
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
}

function getUserDepartmentIds(userDepartments: Array<Department>): number[] {
    return userDepartments.map((department) => department.id);
}

const saveDepartments = async (departmentIds: Array<number>): Promise<void> => {
    await useMyFetch("api/user/update-departments", {
        body: { department_ids: departmentIds },
        method: "POST",
        credentials: "include",
    });
};

const updateDefaultAddress = async (addressData: Address): Promise<void> => {
    await useMyFetch("api/user/update-default-address", {
        method: "POST",
        body: addressData,
    });
};
</script>

<template>
    <div class="px-2 lg:px-0">
        <DashboardNavigation class="hidden lg:block" />
        <DashboardProfileAvatar class="lg:mt-12" />

        <div class="flex gap-16 mt-8 lg:mt-14 flex-wrap lg:flex-nowrap">
            <section class="w-full lg:w-1/2">
                <h2 class="text-xl text-c-black-txt font-semibold">
                    Default Address
                </h2>
                <div class="flex flex-col gap-6 mt-3">
                    <InputText
                        v-model="form.first_name"
                        label="First Name *"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.last_name"
                        label="Last Name *"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.email"
                        label="Email *"
                        :rules="['required', 'email']"
                    />
                    <InputText
                        v-model="form.phone_number"
                        label="Phone number (optional)"
                    />
                    <InputText
                        v-model="form.address_line_1"
                        label="Address Line 1 *"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.address_line_2"
                        label="Address Line 2 (optional)"
                    />
                    <InputText
                        v-model="form.city"
                        label="City *"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.zip"
                        label="Zip *"
                        :rules="['required']"
                    />
                    <InputText
                        v-model="form.country"
                        label="Country *"
                        :rules="['required']"
                    />
                </div>
                <Button
                    @click="updateDefaultAddress(form)"
                    class="mt-6 w-full lg:w-auto"
                    text="Save as default"
                    size="lg"
                />
            </section>

            <section class="w-full lg:w-1/2">
                <h2 class="font-semibold text-c-black-txt text-xl">
                    Your favorite product departments
                </h2>
                <div class="flex flex-col gap-4 mt-8">
                    <InputCheckbox
                        v-for="department in departments"
                        :key="department.id"
                        :value="department.id"
                        v-model="selectedDepartments"
                    >
                        <span class="text-c-black-txt">{{
                            department.name.en
                        }}</span>
                    </InputCheckbox>
                </div>
                <Button
                    @click="saveDepartments(selectedDepartments)"
                    class="mt-6 w-full lg:w-auto"
                    text="Save departments"
                    size="lg"
                />
            </section>
        </div>
    </div>
</template>
