<script setup lang="ts">
const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "About" },
]);
</script>

<template>
    <div class="pb-36">
        <Breadcrumbs class="px-4" :items="breadcrumbsItems" />
        <h1 class="text-5xl font-semibold text-c-black-txt mt-8">About Us</h1>

        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-c-black-txt">Who We Are</h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Welcome to our company, where innovation meets dedication. We
                are a team of passionate professionals committed to delivering
                exceptional solutions and services that drive success for our
                clients. Our journey began with a simple goal: to create value
                through innovation, technology, and customer-centric strategies.
                Over the years, we have grown into a diverse and dynamic
                organization that prides itself on staying ahead of the curve
                and continuously evolving to meet the needs of our customers.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                Our mission is to empower businesses by providing the tools,
                resources, and expertise needed to thrive in today’s competitive
                landscape. We believe in fostering a culture of collaboration,
                creativity, and excellence, which enables us to deliver
                outstanding results for our clients. Whether you're a small
                startup or a large enterprise, we are here to support your
                journey towards success.
            </p>
        </div>

        <!-- Our Values Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Our Core Values
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Our core values are the foundation of everything we do. They
                guide our decisions, shape our culture, and reflect what we
                stand for as a company. These values are not just words on a
                page; they are principles that we live by every day.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Integrity:</strong>
                    We believe in doing the right thing, even when no one is
                    watching. Integrity is the cornerstone of our business, and
                    we are committed to maintaining the highest ethical
                    standards in all our interactions.
                </li>
                <li class="mb-2">
                    <strong>Innovation:</strong>
                    Our passion for innovation drives us to constantly seek new
                    and better ways to solve problems. We embrace change and are
                    always looking for creative solutions that add value for our
                    clients.
                </li>
                <li class="mb-2">
                    <strong>Customer-Centricity:</strong>
                    Our clients are at the heart of everything we do. We listen
                    to their needs, understand their challenges, and work
                    tirelessly to exceed their expectations. Their success is
                    our success.
                </li>
                <li class="mb-2">
                    <strong>Collaboration:</strong>
                    We believe that the best results come from working together.
                    We foster a collaborative environment where diverse
                    perspectives are valued, and teamwork is encouraged.
                </li>
                <li class="mb-2">
                    <strong>Excellence:</strong>
                    We are committed to excellence in everything we do. From the
                    quality of our work to the way we serve our clients, we
                    strive to deliver the highest level of performance.
                </li>
            </ul>
        </div>

        <!-- Our Story Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">Our Story</h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Our story is one of passion, perseverance, and purpose. Founded
                with a vision to create meaningful impact, our journey began in
                a small office with a handful of like-minded individuals who
                shared a common goal: to build a company that would make a
                difference. From those humble beginnings, we have grown into a
                leading provider of innovative solutions, serving clients across
                a wide range of industries.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                Over the years, we have faced many challenges, but each one has
                made us stronger and more resilient. Our ability to adapt,
                innovate, and stay true to our values has been key to our
                success. Today, we are proud to be a trusted partner to our
                clients, helping them navigate the complexities of the modern
                business landscape with confidence and clarity.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                As we look to the future, we remain committed to our mission of
                delivering exceptional value through innovation and
                customer-centric solutions. We are excited about the
                opportunities ahead and look forward to continuing our journey
                with the same passion and purpose that has driven us from the
                start.
            </p>
        </div>

        <!-- Our Team Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Meet Our Team
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Our team is our greatest asset. Comprising experts from diverse
                backgrounds, we bring together a wealth of knowledge,
                experience, and creativity to deliver solutions that make a
                difference. Each member of our team is dedicated to excellence
                and driven by a shared commitment to our clients' success.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                We believe that our strength lies in our diversity. By bringing
                together people with different skills, perspectives, and
                experiences, we create a dynamic environment where innovation
                thrives. Our team is united by a common purpose: to deliver
                outstanding results for our clients while upholding the values
                that define us as a company.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Leadership:</strong>
                    Our leadership team sets the vision and direction for the
                    company. With decades of experience and a deep understanding
                    of the industry, they guide us with wisdom and foresight.
                </li>
                <li class="mb-2">
                    <strong>Experts:</strong>
                    From engineers to designers, our team includes specialists
                    in every field. Their expertise ensures that we deliver
                    top-quality solutions that meet the highest standards.
                </li>
                <li class="mb-2">
                    <strong>Support:</strong>
                    Our support staff is dedicated to providing the best
                    possible experience for our clients. Whether it’s answering
                    questions, providing guidance, or solving problems, they are
                    always ready to help.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                Together, we are more than just a team; we are a family. We
                support each other, celebrate our successes, and learn from our
                challenges. This sense of camaraderie and mutual respect is what
                makes our company a great place to work and do business with.
            </p>
        </div>

        <!-- Our Future Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Looking Ahead
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                As we continue to grow and evolve, we remain focused on our
                vision for the future. We are committed to staying at the
                forefront of innovation, exploring new opportunities, and
                expanding our reach to serve more clients around the world. Our
                goal is to build on our success by continuously improving,
                adapting, and pushing the boundaries of what’s possible.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                We understand that the world is changing rapidly, and we are
                excited to embrace the challenges and opportunities that come
                with it. By staying true to our values and focusing on what
                matters most—our clients, our people, and our mission—we are
                confident that the future holds great promise for our company
                and our partners.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                Thank you for taking the time to learn more about us. We invite
                you to join us on this exciting journey as we continue to make a
                positive impact and create value for our clients and
                communities.
            </p>
        </div>
    </div>
</template>
