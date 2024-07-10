<script setup lang="ts">
const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Investor Relations" },
]);
</script>

<template>
    <div class="pb-36">
        <Breadcrumbs class="px-4" :items="breadcrumbsItems" />

        <h1 class="text-5xl font-semibold text-c-black-txt mt-8">
            Privacy Policy
        </h1>

        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Introduction
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                At Amazon, we value your privacy and are committed to protecting
                your personal information. This Privacy Policy outlines how we
                collect, use, and safeguard the data you provide to us when
                using our website, products, and services. We believe in
                transparency and want you to understand the measures we take to
                ensure your information remains secure and confidential.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                By using our services, you consent to the practices described in
                this Privacy Policy. We encourage you to read this policy
                carefully and contact us if you have any questions or concerns
                regarding your privacy.
            </p>
        </div>

        <!-- Information We Collect Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Information We Collect
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We collect various types of information to provide and improve
                our services. The information we collect falls into two
                categories: personal information and non-personal information.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Personal Information:</strong> This includes data
                    that can be used to identify you as an individual, such as
                    your name, email address, phone number, and payment
                    information. We collect this information when you create an
                    account, make a purchase, or interact with our customer
                    support.
                </li>
                <li class="mb-2">
                    <strong>Non-Personal Information:</strong> This includes
                    data that does not directly identify you, such as browsing
                    behavior, device information, and aggregated statistical
                    data. We use this information to understand how our services
                    are used and to improve the user experience.
                </li>
            </ul>
        </div>

        <!-- How We Use Your Information Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                How We Use Your Information
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                The information we collect is used for various purposes,
                including:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Providing Services:</strong> We use your information
                    to deliver the products and services you request, manage
                    your account, and process payments.
                </li>
                <li class="mb-2">
                    <strong>Improving Our Services:</strong> We analyze the data
                    we collect to enhance our offerings, develop new features,
                    and improve overall performance.
                </li>
                <li class="mb-2">
                    <strong>Communication:</strong> We may use your contact
                    information to send you updates, promotions, and important
                    notices related to your account or our services. You can opt
                    out of these communications at any time.
                </li>
                <li class="mb-2">
                    <strong>Compliance and Security:</strong> We may use your
                    information to comply with legal obligations, enforce our
                    terms of service, and protect our company, users, and the
                    public from harm.
                </li>
            </ul>
        </div>

        <!-- How We Share Your Information Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                How We Share Your Information
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We do not sell your personal information to third parties.
                However, we may share your data with trusted partners and
                service providers under certain circumstances, such as:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Service Providers:</strong> We work with third-party
                    companies that provide services on our behalf, such as
                    payment processing, data analysis, email delivery, and
                    customer support. These providers have access to your
                    personal information only to perform their tasks and are
                    obligated to protect it.
                </li>
                <li class="mb-2">
                    <strong>Business Transfers:</strong> In the event of a
                    merger, acquisition, or sale of all or part of our assets,
                    your information may be transferred as part of that
                    transaction. We will notify you before your data is subject
                    to a different privacy policy.
                </li>
                <li class="mb-2">
                    <strong>Legal Requirements:</strong> We may disclose your
                    information if required by law or if we believe in good
                    faith that such action is necessary to comply with legal
                    obligations, protect our rights or the rights of others,
                    investigate fraud, or ensure the safety of our users.
                </li>
            </ul>
        </div>

        <!-- Your Choices and Rights Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Your Choices and Rights
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We respect your privacy and provide you with choices regarding
                your personal information. Depending on your location, you may
                have the following rights:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Access:</strong> You have the right to request
                    access to the personal information we hold about you,
                    including details on how we use and share it.
                </li>
                <li class="mb-2">
                    <strong>Correction:</strong> You have the right to request
                    corrections to any inaccurate or incomplete personal
                    information we hold about you.
                </li>
                <li class="mb-2">
                    <strong>Deletion:</strong> You have the right to request the
                    deletion of your personal information, subject to certain
                    legal obligations or legitimate business needs.
                </li>
                <li class="mb-2">
                    <strong>Opt-Out:</strong> You can opt out of receiving
                    promotional communications from us by following the
                    unsubscribe instructions in those communications or by
                    contacting us directly.
                </li>
                <li class="mb-2">
                    <strong>Data Portability:</strong> You have the right to
                    request a copy of your personal information in a structured,
                    commonly used, and machine-readable format.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                If you would like to exercise any of these rights, please
                contact us at [Contact Information]. We will respond to your
                request in accordance with applicable laws and strive to fulfill
                it within a reasonable timeframe.
            </p>
        </div>

        <!-- Security Measures Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Security Measures
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Protecting your personal information is a top priority for us.
                We implement a variety of security measures to safeguard your
                data against unauthorized access, disclosure, alteration, or
                destruction. These measures include:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Encryption:</strong> We use encryption technology to
                    protect your data during transmission and storage.
                </li>
                <li class="mb-2">
                    <strong>Access Controls:</strong> We restrict access to your
                    personal information to authorized personnel only, ensuring
                    that those who handle your data are trained and aware of
                    their privacy obligations.
                </li>
                <li class="mb-2">
                    <strong>Monitoring:</strong> We regularly monitor our
                    systems for vulnerabilities and conduct security assessments
                    to maintain the integrity of your data.
                </li>
                <li class="mb-2">
                    <strong>Incident Response:</strong> In the event of a data
                    breach, we have procedures in place to respond promptly and
                    mitigate any potential harm to your information.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                While we take these precautions, no security measures are
                entirely foolproof. We encourage you to take steps to protect
                your information, such as using strong passwords and keeping
                your login credentials confidential.
            </p>
        </div>

        <!-- Third-Party Links and Services Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Third-Party Links and Services
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Our website and services may contain links to third-party
                websites or services that are not operated by us. This Privacy
                Policy does not apply to those third parties, and we are not
                responsible for their practices. We encourage you to review the
                privacy policies of any third-party sites or services you
                interact with.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                Additionally, some third-party services integrated into our
                platform, such as payment processors, may collect information
                directly from you. In such cases, the third party's privacy
                policy governs the collection and use of your information.
            </p>
        </div>

        <!-- Changes to This Privacy Policy Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Changes to This Privacy Policy
            </h2>
            <p class="mt-4 text-lg text-c-black-ttxt">
                We may update this Privacy Policy from time to time to reflect
                changes in our practices, legal requirements, or other factors.
                When we make significant changes, we will notify you by updating
                the policy on our website and revising the "Last Updated" date
                at the top of this page.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                We encourage you to review this policy periodically to stay
                informed about how we protect your privacy. Your continued use
                of our services after any changes to this policy constitutes
                your acceptance of the updated terms.
            </p>
        </div>

        <!-- Contact Us Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">Contact Us</h2>
            <p class="mt-4 text-lg text-c-black-txt">
                If you have any questions or concerns about this Privacy Policy
                or how we handle your personal information, please feel free to
                contact us at:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">Email: fakeemail@gmail.com</li>
                <li class="mb-2">Phone: +22 853 9234 12</li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                We are committed to addressing your inquiries promptly and
                ensuring that your privacy concerns are resolved to your
                satisfaction.
            </p>
        </div>
    </div>
</template>
