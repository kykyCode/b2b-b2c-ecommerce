<script setup lang="ts">
const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Delivery" },
]);
</script>

<template>
    <div class="pb-36">
        <Breadcrumbs class="px-4" :items="breadcrumbsItems" />

        <h1 class="text-4xl font-semibold text-c-black-txt mt-8">
            Delivery Information
        </h1>
        <div class="mt-8 text-lg text-c-black-txt">
            <p>
                We strive to provide fast, reliable, and efficient delivery
                services to ensure your orders reach you on time. Our commitment
                to customer satisfaction drives us to continuously improve our
                delivery process. Whether you’re ordering from across the street
                or across the country, we work with a network of trusted
                carriers to bring your items directly to your door. We
                understand that receiving your order promptly is important, and
                we make it a priority to provide accurate delivery estimates and
                timely updates on your order status.
            </p>

            <h2 class="mt-8 text-2xl font-semibold">Delivery Options</h2>
            <ul class="list-disc list-inside pl-4 space-y-2 mt-4">
                <li>
                    <strong>Standard Delivery:</strong> 3-5 business days. This
                    option is ideal for those who do not need their items
                    urgently. Standard delivery is cost-effective and reliable,
                    ensuring your package arrives within the specified
                    timeframe.
                </li>
                <li>
                    <strong>Express Delivery:</strong> 1-2 business days. For
                    those who need their orders as quickly as possible, express
                    delivery is the perfect choice. With express delivery, your
                    package will be prioritized to ensure it arrives swiftly.
                </li>
                <li>
                    <strong>Personal Collection:</strong> You can also choose to
                    collect your order from one of our designated collection
                    points. This option is convenient for those who prefer to
                    pick up their items in person at a time that suits them.
                </li>
            </ul>

            <h2 class="mt-8 text-2xl font-semibold">Shipping Costs</h2>
            <p class="mt-4">
                Shipping costs vary based on the delivery option chosen and the
                destination of your order. Standard delivery is affordable and
                free for orders over $50, making it a great option for most
                purchases. For express delivery, there is an additional charge
                due to the expedited service. This charge is calculated at
                checkout based on your location and the size of your order. If
                you choose to collect your order personally, there is no
                shipping cost, and you can pick up your items at your
                convenience.
            </p>

            <h2 class="mt-8 text-2xl font-semibold">Tracking Your Order</h2>
            <p class="mt-4">
                Once your order is dispatched, you will receive a tracking
                number via email. This tracking number allows you to monitor
                your delivery status in real-time. You can check when your
                package is on the way, see its current location, and get an
                estimated delivery time. If there are any unexpected delays or
                changes to your delivery schedule, the tracking system will
                provide updates so you’re always informed. We recommend keeping
                an eye on your tracking information, especially on the day your
                package is scheduled to arrive.
            </p>

            <h2 class="mt-8 text-2xl font-semibold">Delivery Issues</h2>
            <p class="mt-4">
                If you encounter any issues with your delivery, please contact
                our support team for immediate assistance. We understand that
                delivery problems can be frustrating, and we are committed to
                resolving them as quickly as possible. Whether your package is
                delayed, damaged, or lost, our team is here to help. We will
                work with the carrier to locate your package or provide a
                suitable resolution, such as reshipping the items or offering a
                refund. Your satisfaction is our top priority, and we’re here to
                ensure a smooth delivery experience.
            </p>

            <h2 class="mt-8 text-2xl font-semibold">Ships to Ukraine</h2>
            <p class="mt-4">
                We are proud to offer delivery services to Ukraine, ensuring
                that our customers in this region can access our products
                without unnecessary delays. Despite the logistical challenges
                that may arise, we have partnered with reliable carriers who
                specialize in international shipments to ensure timely and
                secure delivery to Ukraine. Whether you are in Kyiv, Lviv, or
                any other city, our delivery options, including both standard
                and express, are available to meet your needs. We recognize the
                importance of offering global access to our products and are
                committed to providing a seamless experience for our customers
                in Ukraine. Please note that delivery times may vary depending
                on local customs and import regulations. We advise our customers
                in Ukraine to stay updated on their tracking information for the
                most accurate delivery estimates.
            </p>

            <h2 class="mt-8 text-2xl font-semibold">Eco Delivery</h2>
            <p class="mt-4">
                As part of our commitment to sustainability, we are excited to
                introduce our Eco Delivery option. This service is designed for
                environmentally conscious customers who want to reduce their
                carbon footprint. Eco Delivery prioritizes the use of electric
                vehicles, bicycles, and other low-emission methods of
                transportation to deliver your orders. Additionally, all
                packaging used in Eco Delivery is 100% recyclable or made from
                biodegradable materials, ensuring that your delivery has minimal
                impact on the environment. By choosing Eco Delivery, you are not
                only receiving your products but also contributing to a greener
                future. Although Eco Delivery may take slightly longer than
                traditional methods, the environmental benefits make it a
                worthwhile choice for those who prioritize sustainability. We
                believe that small changes can make a big difference, and Eco
                Delivery is one way we are working towards a more sustainable
                world.
            </p>
        </div>
    </div>
</template>
