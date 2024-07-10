<script setup lang="ts">
const { user } = useUserStore();
const { me } = useAuth();

const changeAvatar = async (event: Event) => {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];

    if (file) {
        const formData = new FormData();
        formData.append("avatar", file);

        await useMyFetch("api/user/update-avatar", {
            credentials: "include",
            body: formData,
            method: "POST",
            async onResponse({ response }) {
                await me();
            },
        });
    }
};
</script>

<template>
    <div class="flex items-center gap-8">
        <div
            class="w-36 h-36 shrink-0 lg:w-48 lg:h-48 rounded-full shadow-c border flex items-center justify-center relative"
        >
            <img
                v-if="user.avatar"
                :src="user.avatar"
                alt=""
                class="w-full h-full object-cover rounded-full"
            />
            <Icon
                v-else
                name="material-symbols:person"
                class="text-8xl text-c-orange"
            >
            </Icon>
            <label
                for="fileInput"
                class="bg-c-orange absolute right-2 bottom-2 rounded-full h-10 w-10 z-50 shadow hover:shadow-c-orange transition-all cursor-pointer flex items-center justify-center"
            >
                <Icon
                    name="material-symbols:person-edit"
                    class="text-white text-3xl"
                ></Icon>
                <input
                    type="file"
                    class="w-0"
                    id="fileInput"
                    name="fileInput"
                    @change="changeAvatar"
                />
            </label>
        </div>
        <div>
            <div class="lg:text-3xl font-extrabold text-c-black-txt">
                {{ user.first_name }} {{ user.last_name }}
            </div>
            <div class="text-c-black-txt text-sm lg:text-base">
                {{ user.email }}
            </div>
            <div
                class="text-c-gray text-xs lg:text-base mt-1 lg:mt-0 leading-4"
            >
                32 reviews | 12 answers | 7321 points | 12 favorite products
            </div>
        </div>
    </div>
</template>
