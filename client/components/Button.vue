<script setup lang="ts">
interface Props {
    text?: string;
    size?: string;
    iconSide?: string;
    link?: string | object;
    variant?: string;
    iconName?: string;
    disabled?: boolean;
}

withDefaults(defineProps<Props>(), {
    size: "base",
    iconSide: "left",
    variant: "primary",
});

const nuxtLink = resolveComponent("NuxtLink");

const slotRef = ref<HTMLElement | null>(null);
const hasSlotContent = computed(() => {
    return slotRef.value?.hasChildNodes() ?? false;
});
</script>

<template>
    <component
        :disabled="disabled"
        :is="link ? nuxtLink : 'button'"
        :to="link"
        class="rounded-lg font-bold transition-all w-fit h-fit whitespace-nowrap text-center tracking-tighter"
        :class="[
            variant !== 'ghost' && text
                ? [
                      {
                          'px-8 py-2': size === 'lg',
                          'px-6 py-2': size === 'base' || size === 'sm',
                          'px-3 py-1': size === 'xs',
                      },
                  ]
                : {},
            {
                'text-lg': size === 'xl',
                'text-base': size === 'lg',
                'text-sm': size === 'base' || size === 'sm',
                'text-xs': size === 'xs',
            },
            {
                block: link,
            },
            {
                'opacity-30 pointer-events-none': disabled,
            },
            {
                'bg-c-orange text-white shadow hover:text-white shadow-orange-200 hover:shadow-lg hover:shadow-orange-200':
                    variant === 'primary',
                'outline outline-1 outline-c-black-btn text-c-black-btn':
                    variant === 'secondary',
                'hover:outline-c-orange hover:text-c-orange':
                    variant === 'primary' || variant === 'secondary',
                'text-black-txt font-normal hover:text-black':
                    variant === 'ghost',
                'text-c-gray font-normal hover:text-black-txt py-0':
                    variant === 'text',
            },
        ]"
        :role="link ? 'link' : 'button'"
        :aria-label="text"
    >
        <span
            class="flex items-center gap-2 mx-auto"
            :class="[
                {
                    'flex-row-reverse': iconSide === 'right',
                    'justify-center': hasSlotContent,
                },
            ]"
        >
            <Icon
                v-if="iconName"
                :name="iconName"
                aria-hidden="true"
                :class="[{ 'text-3xl': size == '2xl' }]"
            />
            <span v-if="text">{{ text }}</span>
            <span ref="slotRef"><slot /></span>
        </span>
    </component>
</template>
