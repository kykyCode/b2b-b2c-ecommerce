<script setup lang="ts">
definePageMeta({
    middleware: ["auth"],
    step: "orders",
});

interface MappedOrder {
    id: number;
    user: string;
    status: string;
    paymentStatus: string;
    paid: boolean;
    total: number;
    created_at: string;
    paymentUrl: string;
}

const { data: orders } = await useMyFetch<Array<Order>>("api/orders");

const orderBy = ref("id");
const orderType = ref("asc");

const tableMappedOrders = computed<MappedOrder>(() => {
    return orders.value.data.map((order) => ({
        id: order.id,
        user: order.user.email,
        status: order.status,
        paymentStatus: order.payment.status,
        paid: order.payment.paid,
        total: order.payment.total,
        created_at: order.created_at,
        paymentUrl: order.payment.checkout_session_url,
    }));
});
</script>

<template>
    <div class="min-h-[700px]">
        <DashboardNavigation />
        <div class="mt-4">
            <Table
                v-slot="{ item }"
                v-model:sortingColumn="orderBy"
                v-model:sortingDirection="orderType"
                :data="tableMappedOrders"
            >
                <TableColumn :title="'No.'" :name="'id'" :sortable="true">
                    <span class="font-semibold text-c-black-txt">
                        #BTC-{{ item.id }}
                    </span>
                </TableColumn>

                <TableColumn
                    :title="'Order date'"
                    :name="'created_at'"
                    :sortable="true"
                >
                    {{ item.created_at }}
                </TableColumn>
                <TableColumn :title="'Payment'" :name="'payment'">
                    <template v-if="item.paymentStatus === 'paid'">
                        <TableBadge :text="'Paid'" :color="'green'" />
                    </template>
                    <template v-else-if="item.paymentStatus === 'waiting'">
                        <a :href="item.paymentUrl">
                            <TableBadge
                                :text="'Click to pay'"
                                :color="'orange'"
                            />
                        </a>
                    </template>
                    <template v-else-if="item.paymentStatus === 'canceled'">
                        <TableBadge :text="'Canceled'" :color="'red'" />
                    </template>
                </TableColumn>
                <TableColumn :title="'Status'" :name="'status'">
                    <TableBadge
                        v-if="item.status === 'pending'"
                        :color="'blue'"
                        :text="'Pending'"
                    ></TableBadge>
                    <TableBadge
                        v-else-if="item.status === 'hold'"
                        :color="'yellow'"
                        :text="'Hold'"
                    ></TableBadge>
                </TableColumn>
                <TableColumn
                    class="text-xl"
                    :title="'Total price'"
                    :name="'total'"
                    :sortable="true"
                >
                    ${{ item.total }}
                </TableColumn>
                <TableColumn class="text-xl" :name="'total'" :sortable="true">
                    <NuxtLink
                        :to="{
                            name: 'dashboard-orders-order',
                            params: { order: item.id },
                        }"
                        class="text-sm font-medium p-2 rounded-lg border-2 text-c-black-txt"
                    >
                        Show details
                    </NuxtLink>
                </TableColumn>
            </Table>
        </div>
    </div>
</template>
