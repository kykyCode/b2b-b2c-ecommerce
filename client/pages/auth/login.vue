<script setup lang="ts">
definePageMeta({
    layout: "auth",
});

interface Credentials {
    password: string;
    login: string;
}

const router = useRouter();

const credentials = ref<UserRegistrationData>({
    password: "",
    login: "",
});

const { login } = useAuth();

const loginUser = async (): Promise<void> => {
    try {
        await login(credentials.value).then((res) => {
            router.push({ name: "dashboard-profile" });
        });
    } catch (error) {}
};
</script>

<template>
    <div class="flex justify-center items-center h-full">
        <div class="flex flex-col gap-8 w-96">
            <Logo class="mx-auto"></Logo>
            <InputText
                v-model="credentials.login"
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
            <NuxtLink
                :to="{ name: 'auth-register' }"
                class="text-xs font-medium text-c-gray hover:text-c-black-txt transition-colors"
            >
                Don't Have an Account Yet? Join us today!
            </NuxtLink>
            <Button
                @click="loginUser"
                :variant="'primary'"
                :size="'lg'"
                :text="'Login'"
                class="w-full mt-4"
            ></Button>
        </div>
    </div>
</template>
