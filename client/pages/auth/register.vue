<script setup lang="ts">
definePageMeta({
    layout: "auth",
});

const router = useRouter();

interface Credentials {
    password: string;
    email: string;
    password_confirmation?: string;
}

const credentials = ref<Credentials>({
    password: "",
    email: "",
});

const { register } = useAuth();

const registerUser = async (): Promise<void> => {
    try {
        const response = await register(credentials.value);
        if (response.status.value == "success") {
            router.push({
                name: "auth-thank-for-registering",
                query: { email: response.data._value.user.email },
            });
        } else {
        }
    } catch (error) {}
};
</script>

<template>
    <div class="flex justify-center items-center h-full">
        <div class="flex flex-col gap-8 w-96">
            <Logo class="mx-auto"></Logo>
            <InputText
                v-model="credentials.email"
                :name="'login'"
                :label="'E-mail'"
                :type="'text'"
                class="w-full"
            ></InputText>
            <InputText
                v-model="credentials.password"
                :name="'password'"
                :label="'Password'"
                :type="'password'"
                class="w-full"
            ></InputText>
            <InputText
                v-model="credentials.password_confirmation"
                :name="'password'"
                :label="'Repeat password'"
                :type="'password'"
                class="w-full"
            ></InputText>
            <Button
                @click="registerUser"
                :variant="'primary'"
                :size="'lg'"
                :text="'Registration request'"
                class="w-full mt-4"
            ></Button>
        </div>
    </div>
</template>
