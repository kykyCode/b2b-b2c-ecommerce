<script setup lang="ts">
definePageMeta({
    middleware: ["auth"],
    step: "orders",
});

const route = useRoute();

const { data: order } = await useMyFetch<Order>(
    `api/orders/${route.params.order}`
);

const items = computed(() => {
    return order.value.items.map((item) => ({
        productName: item.product.name.en,
        productImage: item.product.main_image,
        quantity: item.quantity,
        productPrice: item.product.catalogue_price,
        totalPrice: item.total,
    }));
});

const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Dashboard" },
    { name: "Orders", to: { name: "dashboard-orders" } },
    { name: `Order #BTC-${order.value.id}` },
]);
</script>

<template>
    <div>
        <Breadcrumbs :items="breadcrumbsItems" class="mt-4" />

        <div class="flex items-center justify-between mt-12">
            <h1 class="text-4xl font-semibold text-c-black-txt">
                Order #BTC-{{ order.id }}
            </h1>
            <div>
                <TableBadge
                    v-if="order.status === 'pending'"
                    :color="'blue'"
                    :text="'Pending'"
                ></TableBadge>
                <TableBadge
                    v-else-if="order.status === 'hold'"
                    :color="'yellow'"
                    :text="'Hold'"
                ></TableBadge>
            </div>
        </div>
        <div class="flex items-center mt-2 gap-4 text-c-gray text-sm">
            Order date: {{ order.created_at }}
        </div>
        <div class="flex mt-6 bg-c-skin-light p-8 rounded-sm text-c-black-txt">
            <div class="w-1/2">
                <h2 class="text-2xl font-semibold text-c-black-txt mb-2">
                    Payment
                </h2>
                <div>
                    Method:
                    <span class="font-semibold text-c-black-txt ml-1">
                        Stripe
                    </span>
                </div>
                <div class="flex gap-2 mt-2 items-center">
                    <span>Status: </span>
                    <div>
                        <template v-if="order.payment.status === 'paid'">
                            <TableBadge :text="'Paid'" :color="'green'" />
                        </template>
                        <template
                            v-else-if="order.payment.status === 'waiting'"
                        >
                            <a :href="order.payment.checkout_session_url">
                                <TableBadge
                                    :text="'Click to pay'"
                                    :color="'orange'"
                                />
                            </a>
                        </template>
                        <template
                            v-else-if="order.payment.status === 'canceled'"
                        >
                            <TableBadge :text="'Canceled'" :color="'red'" />
                        </template>
                    </div>
                </div>
                <div class="flex gap-2 mt-2 items-center">
                    Checkout session:
                    <span
                        class="bg-white shadow-sm px-3 rounded-lg font-medium text-xs py-1 hover:cursor-pointer hover:shadow-sm transition-all"
                        >{{ order.payment.checkout_session_id }}</span
                    >
                </div>
                <div class="mt-2 flex gap-2 items-center">
                    Total amount:
                    <span class="text-lg text-c-black-txt font-semibold"
                        >${{ order.payment.total }}</span
                    >
                </div>
            </div>
            <div class="w-1/2 text-right">
                <h2 class="text-2xl font-semibold text-c-black-txt mb-2">
                    Address
                </h2>
                <div class="flex flex-col text-sm gap-1 text-c-black-txt">
                    <div>First name: {{ order.address_data.first_name }}</div>
                    <div>Last name: {{ order.address_data.last_name }}</div>
                    <div>
                        Email:
                        {{ order.address_data.email ?? order.user.email }}
                    </div>
                    <div>
                        Street: {{ order.address_data.address_line_1 }},
                        {{ order.address_data.address_line_2 }}
                    </div>
                    <div>City: {{ order.address_data.city }}</div>

                    <div>Zip: {{ order.address_data.zip }}</div>

                    <div>Country: {{ order.address_data.country }}</div>
                </div>
            </div>
        </div>

        <h2 class="text-4xl font-semibold text-c-black-txt mt-8 mb-6">
            Order items ({{ items.length }})
        </h2>

        <Table
            v-slot="{ item }"
            v-model:sortingColumn="orderBy"
            v-model:sortingDirection="orderType"
            :data="items"
        >
            <TableColumn :title="'Product'" :name="'product'" :sortable="true">
                <div class="flex gap-8 items-center">
                    <img class="w-16 h-16" :src="item.productImage" alt="" />
                    <span class="text-base font-semibold text-c-black-txt">{{
                        item.productName
                    }}</span>
                </div>
            </TableColumn>
            <TableColumn
                :title="'Catalogue price'"
                :name="'catalogue_price'"
                :sortable="true"
            >
                <span class="text-lg font-semibold text-c-black-txt">
                    ${{ item.productPrice }}
                </span>
            </TableColumn>
            <TableColumn
                :title="'Quantity'"
                :name="'catalogue_price'"
                :sortable="true"
            >
                {{ item.quantity }}
            </TableColumn>
            <TableColumn
                :title="'Total price'"
                :name="'total_price'"
                :sortable="true"
            >
                <span class="text-lg font-semibold text-c-black-txt">
                    ${{ item.totalPrice }}
                </span>
            </TableColumn>
        </Table>
    </div>
</template>
