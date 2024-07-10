<script setup lang="ts">
const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Careers" },
]);
</script>

<template>
    <div class="pb-36">
        <Breadcrumbs class="px-4" :items="breadcrumbsItems" />

        <h1 class="text-5xl font-semibold text-c-black-txt mt-8">Careers</h1>

        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Introduction
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                At Amazon, we believe that our people are our greatest asset.
                Our success is driven by the talent, creativity, and dedication
                of our employees. This Careers page is designed to provide you
                with insights into our work culture, values, and the
                opportunities available at Amazon. Whether you are just starting
                your career or looking to take the next step, we offer a dynamic
                and inclusive environment where you can grow, learn, and make an
                impact.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                We are always on the lookout for passionate, innovative, and
                driven individuals who are eager to be part of something bigger.
                If you are excited about shaping the future and thrive in a
                fast-paced environment, Amazon might be the perfect place for
                you.
            </p>
        </div>

        <!-- Our Work Culture Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Our Work Culture
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                At Amazon, we foster a work culture that encourages innovation,
                collaboration, and continuous learning. Our core values guide us
                in everything we do, from how we serve our customers to how we
                treat our employees. Here’s what you can expect from our work
                environment:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Customer Obsession:</strong> We are driven by our
                    mission to be Earth's most customer-centric company. Every
                    decision we make and every action we take is focused on
                    delivering the best experience for our customers.
                </li>
                <li class="mb-2">
                    <strong>Ownership:</strong> We empower our employees to take
                    ownership of their work. We believe in giving people the
                    autonomy to make decisions and drive projects forward.
                </li>
                <li class="mb-2">
                    <strong>Innovation:</strong> We constantly challenge the
                    status quo and encourage our teams to think outside the box.
                    Innovation is at the heart of everything we do.
                </li>
                <li class="mb-2">
                    <strong>Inclusivity:</strong> We embrace diversity and
                    inclusion, believing that a wide range of perspectives leads
                    to better ideas and outcomes. We are committed to building a
                    workplace where everyone feels valued and respected.
                </li>
                <li class="mb-2">
                    <strong>Learning and Growth:</strong> We are committed to
                    continuous improvement, both as a company and as
                    individuals. We offer numerous opportunities for
                    professional development and career growth.
                </li>
            </ul>
        </div>

        <!-- Opportunities at Amazon Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Opportunities at Amazon
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Amazon offers a wide range of career opportunities across
                various fields and industries. Whether you're interested in
                technology, operations, marketing, finance, or any other area,
                there’s a place for you here. Our global presence and diverse
                business units provide endless possibilities for career growth
                and development.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Technology and Engineering:</strong> Work on
                    cutting-edge projects that push the boundaries of
                    technology. From AI and machine learning to cloud computing
                    and robotics, our tech teams are at the forefront of
                    innovation.
                </li>
                <li class="mb-2">
                    <strong>Operations and Fulfillment:</strong> Be part of the
                    team that ensures our customers receive their orders quickly
                    and efficiently. Our operations roles range from warehouse
                    management to logistics and supply chain optimization.
                </li>
                <li class="mb-2">
                    <strong>Marketing and Sales:</strong> Help us connect with
                    our customers in meaningful ways. Our marketing and sales
                    teams are responsible for driving growth and building brand
                    loyalty.
                </li>
                <li class="mb-2">
                    <strong>Finance and Accounting:</strong> Play a crucial role
                    in our financial success. Our finance teams work on
                    budgeting, forecasting, and analysis to support strategic
                    decision-making.
                </li>
                <li class="mb-2">
                    <strong>Customer Support:</strong> Provide world-class
                    service to our customers. Our customer support teams are
                    dedicated to solving problems and ensuring customer
                    satisfaction.
                </li>
            </ul>
        </div>

        <!-- Professional Development Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Professional Development
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                At Amazon, we believe that learning never stops. We are
                committed to helping our employees achieve their full potential
                by providing a wide range of professional development
                opportunities. Whether you’re looking to gain new skills,
                advance your career, or explore new areas of interest, we offer
                resources and programs to support your growth.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Training Programs:</strong> We offer a variety of
                    training programs, both online and in-person, to help you
                    develop the skills you need to succeed. These programs cover
                    everything from technical skills to leadership development.
                </li>
                <li class="mb-2">
                    <strong>Mentorship:</strong> Our mentorship program pairs
                    you with experienced professionals who can provide guidance,
                    support, and insights as you navigate your career.
                </li>
                <li class="mb-2">
                    <strong>Career Pathing:</strong> We work with you to create
                    a personalized career path that aligns with your goals and
                    aspirations. Whether you want to move up within your current
                    role or explore new opportunities within the company, we’re
                    here to help.
                </li>
                <li class="mb-2">
                    <strong>Educational Support:</strong> We provide tuition
                    assistance and other educational resources to help you
                    continue your education while working at Amazon.
                </li>
            </ul>
        </div>

        <!-- Our Commitment to Diversity and Inclusion Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Our Commitment to Diversity and Inclusion
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Diversity and inclusion are not just buzzwords at Amazon; they
                are integral to our mission and values. We believe that a
                diverse workforce is a key driver of innovation and success. Our
                commitment to inclusivity extends to all aspects of our
                business, from hiring practices to team dynamics.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Inclusive Hiring:</strong> We strive to attract,
                    retain, and promote individuals from diverse backgrounds.
                    Our recruitment process is designed to be fair and unbiased,
                    ensuring equal opportunities for all candidates.
                </li>
                <li class="mb-2">
                    <strong>Employee Resource Groups:</strong> We support
                    various Employee Resource Groups (ERGs) that provide
                    networking, mentorship, and professional development
                    opportunities for employees with shared interests or
                    backgrounds.
                </li>
                <li class="mb-2">
                    <strong>Inclusive Leadership:</strong> Our leaders are
                    committed to fostering a culture of inclusion. We provide
                    training and resources to ensure that our managers are
                    equipped to lead diverse teams effectively.
                </li>
                <li class="mb-2">
                    <strong>Community Engagement:</strong> We actively engage
                    with diverse communities outside of Amazon, partnering with
                    organizations that promote diversity and inclusion in the
                    workplace and beyond.
                </li>
            </ul>
        </div>

        <!-- How to Apply Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                How to Apply
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Ready to join Amazon? Applying for a position is
                straightforward. Follow these steps to start your journey with
                us:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Search for Open Positions:</strong> Visit our
                    Careers page to explore current job openings. You can search
                    by location, department, or job type.
                </li>
                <li class="mb-2">
                    <strong>Submit Your Application:</strong> Once you find a
                    position that matches your skills and interests, submit your
                    application online. Make sure to include your resume and a
                    cover letter that highlights your qualifications.
                </li>
                <li class="mb-2">
                    <strong>Interview Process:</strong> If your application is
                    shortlisted, you’ll be invited to participate in our
                    interview process. Depending on the role, this may include
                    phone interviews, virtual interviews, or in-person meetings.
                </li>
                <li class="mb-2">
                    <strong>Offer and Onboarding:</strong> If you’re selected
                    for the role, we’ll extend a job offer and guide you through
                    the onboarding process to ensure a smooth transition into
                    your new position.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                We are excited to learn more about you and explore how you can
                contribute to Amazon’s continued success. If you have any
                questions about the application process, please feel free to
                reach out to our recruitment team.
            </p>
        </div>

        <!-- Contact Us Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">Contact Us</h2>
            <p class="mt-4 text-lg text-c-black-txt">
                If you have any questions about career opportunities at Amazon
                or need assistance with your application, please don't hesitate
                to contact us:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">Email: careers@amazon.com</li>
                <li class="mb-2">Phone: +22 853 9234 45</li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                We look forward to hearing from you and potentially welcoming
                you to our team.
            </p>
        </div>
    </div>
</template>
