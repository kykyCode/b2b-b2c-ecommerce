<script setup lang="ts">
interface Column {
    title: string;
    key: string;
}

interface Props<T> {
    data: Array<T>;
}

const props = defineProps<Props<any>>();

const slots = useSlots();

const columns = computed<Column[]>(() => {
    if (!slots.default) return [];
    const allSlots = slots.default({});
    if (
        allSlots &&
        typeof allSlots[0].type === "symbol" &&
        allSlots.length === 1
    ) {
        if (Array.isArray(allSlots[0].children)) {
            return allSlots[0].children.flatMap((node: any) => node.props);
        }
        return [];
    }
    return allSlots.flatMap((node: any) => node.props);
});
</script>

<template>
    <table class="w-full">
        <thead class="border-b">
            <tr>
                <th
                    v-for="(column, index) in columns"
                    :key="index"
                    class="p-6 text-white font-normal text-left first:rounded-tl last:rounded-tr"
                >
                    <div
                        class="flex justify-between gap-3 text-xl font-semibold text-c-black-txt"
                    >
                        {{ column.title }}
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, key) in data" :key="item.id">
                <slot :item="item">
                    {{ item }}
                </slot>
            </tr>
            <tr v-if="!data?.length">
                <td :colspan="columns.length">
                    <slot name="empty"> Nothing found... </slot>
                </td>
            </tr>
        </tbody>
    </table>
</template>
