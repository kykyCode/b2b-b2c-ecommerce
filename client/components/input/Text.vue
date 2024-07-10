<script setup lang="ts">
interface Props {
    modelValue: string | number | null;
    type?: string;
    maxLength?: number;
    name?: string;
    label?: string;
    rules?: string[];
}

const props = defineProps<Props>();
const emit = defineEmits<{
    (e: "update:modelValue", value: string | number | null): void;
}>();

const localValue = ref<string | number | null>(props.modelValue);
const touched = ref<boolean>(false);
const error = ref<string>("");

watch(localValue, (newValue) => {
    if (!touched.value) {
        touched.value = true;
    }
    emit("update:modelValue", newValue);
    if (touched.value) {
        validate(newValue);
    }
});

const validate = (value: string | number | null) => {
    if (!touched.value) return;

    error.value = "";

    if (props.rules) {
        const stringValue = String(value).trim();

        if (props.rules.includes("required") && stringValue.length === 0) {
            error.value = "This field is required.";
        } else if (props.rules.includes("email")) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(stringValue)) {
                error.value = "Please enter a valid email address.";
            }
        } else if (props.rules.includes("phone")) {
            const phoneRegex = /^[0-9]{9,12}$/;
            if (!phoneRegex.test(stringValue)) {
                error.value =
                    "Please enter a valid phone number (9-12 digits).";
            }
        }
    }
};

const inputMaxLength = computed<number | undefined>(() => {
    return props.type === "text" ? props.maxLength : undefined;
});

validate(localValue.value);
</script>

<template>
    <div class="input-group">
        <label :for="name" class="text-sm text-c-gray font-medium mb-1 flex">
            {{ label }}
            <transition name="text-red-600">
                <div v-if="error" class="text-red-600 ml-3 text-2xs">
                    {{ error }}
                </div>
            </transition>
        </label>
        <input
            :id="name"
            :type="type || 'text'"
            v-model.lazy="localValue"
            :maxlength="inputMaxLength"
            class="border-2 px-3.5 py-3 text-c-gray rounded-lg placeholder:text-sm placeholder:tracking-tight w-full font-semibold"
            :class="error ? 'border-red-600' : 'border-c-skin'"
            @blur="
                touched.value = true;
                validate(localValue);
            "
        />
    </div>
</template>

<style scoped>
.input-group {
    width: 100%;
}

input {
    transition: border-color 0.3s ease;
}

input.border-red-600 {
    animation: shake 0.3s ease;
}

@keyframes shake {
    0%,
    100% {
        transform: translateX(0);
    }
    20%,
    60% {
        transform: translateX(-4px);
    }
    40%,
    80% {
        transform: translateX(4px);
    }
}

.text-red-600 {
    transition: opacity 0.2s ease, transform 0.2s ease;
    opacity: 1;
}

.text-red-600-enter-active {
    opacity: 0;
}

.text-red-600-leave-active {
    opacity: 0;
}
</style>
