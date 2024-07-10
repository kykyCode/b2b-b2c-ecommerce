<script setup lang="ts">
const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Newsletter" },
]);

const email = ref("");
</script>

<template>
    <div class="pb-36">
        <Breadcrumbs class="px-4" :items="breadcrumbsItems" />

        <h1 class="text-5xl font-semibold text-c-black-txt mt-8">Newsletter</h1>

        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Welcome to Our Monthly Newsletter
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We are excited to bring you the latest updates, insights, and
                news directly from our team. This newsletter is packed with
                valuable information designed to keep you informed and inspired.
                Whether you're looking for industry trends, product updates, or
                tips to improve your daily workflow, you'll find it all here.
            </p>
        </div>
        <LandingNewsletterBanner :hide-button="true" class="mt-12" />

        <!-- Featured Articles Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Featured Articles
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                In this edition, we have curated a selection of articles that
                cover a wide range of topics. From deep dives into emerging
                technologies to practical advice on managing your time more
                effectively, these articles are a must-read.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong
                        >Exploring the Future of Artificial
                        Intelligence:</strong
                    >
                    A comprehensive analysis of how AI is transforming
                    industries across the globe.
                </li>
                <li class="mb-2">
                    <strong>Maximizing Productivity in the Digital Age:</strong>
                    Tips and tools to help you stay on top of your game in a
                    fast-paced world.
                </li>
                <li class="mb-2">
                    <strong>Customer Success Stories:</strong>
                    Learn how our clients are leveraging our solutions to
                    achieve remarkable results.
                </li>
            </ul>
        </div>

        <!-- Industry Insights Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Industry Insights
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Staying ahead of industry trends is crucial in today’s rapidly
                evolving landscape. Our team has compiled the latest insights
                from across the industry to help you stay informed and prepared
                for what's next.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                Here are some key trends that we believe will shape the future:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>The Rise of Remote Work:</strong>
                    As remote work becomes the norm, companies are investing in
                    technology to support distributed teams. Understanding the
                    impact of this shift is essential for any business.
                </li>
                <li class="mb-2">
                    <strong
                        >Sustainability and Corporate Responsibility:</strong
                    >
                    Consumers are increasingly demanding that businesses take a
                    stand on environmental and social issues. Companies that
                    prioritize sustainability are seeing improved brand loyalty
                    and customer retention.
                </li>
                <li class="mb-2">
                    <strong>AI and Automation:</strong>
                    Automation is no longer just a buzzword; it's a reality
                    reshaping the workforce. Understanding how AI can be
                    leveraged to improve efficiency is key to staying
                    competitive.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                By keeping an eye on these trends, you can position your
                business to not only survive but thrive in the coming years.
            </p>
        </div>

        <!-- Product Updates Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Product Updates
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We are constantly working to improve our products and services
                to better meet your needs. Here are some of the latest updates
                and enhancements we've made:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>New Features:</strong>
                    Our latest release includes several new features designed to
                    improve user experience and increase productivity. Be sure
                    to check out the detailed release notes on our website.
                </li>
                <li class="mb-2">
                    <strong>Improved Performance:</strong>
                    We’ve optimized our platform to provide faster load times
                    and more reliable performance. Enjoy a smoother experience
                    as you navigate our tools.
                </li>
                <li class="mb-2">
                    <strong>Enhanced Security:</strong>
                    Security is our top priority. Our latest updates include
                    enhanced encryption and additional layers of protection to
                    keep your data safe.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                We are committed to providing the best possible experience for
                our users and will continue to innovate and improve based on
                your feedback.
            </p>
        </div>
        <div class="flex justify-center mt-36">
            <div class="lg:w-1/3">
                <div
                    class="text-sm lg:text-lg font-semibold text-c-black-txt text-center"
                >
                    Enter your email address to subscribe
                </div>
                <InputText
                    v-model="email"
                    :rules="['required', 'email']"
                    class="mt-3"
                ></InputText>
                <div class="flex justify-center">
                    <Button
                        :variant="'primary'"
                        :size="'lg'"
                        :text="'Subscribe'"
                        class="mx-auto mt-6 py-3"
                    ></Button>
                </div>
            </div>
        </div>
    </div>
</template>
