<script setup lang="ts">
const breadcrumbsItems = ref<Array<BreadcrumbsItem>>([
    { name: "Home", to: "/" },
    { name: "Condition of use" },
]);
</script>

<template>
    <div class="pb-36">
        <Breadcrumbs class="px-4" :items="breadcrumbsItems" />
        <h1 class="text-5xl font-semibold text-c-black-txt mt-8">
            Conditions and Rules of Use
        </h1>

        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Introduction
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Welcome to Amazon. By accessing and using our website, products,
                and services, you agree to comply with and be bound by the
                following Conditions and Rules of Use. These terms are designed
                to ensure a safe, fair, and enjoyable experience for all our
                users. Please read these conditions carefully before using our
                services, as they govern your relationship with Amazon.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                If you do not agree to these conditions, you should refrain from
                using our website and services. We reserve the right to update
                or modify these conditions at any time, and your continued use
                of our services constitutes your acceptance of any changes.
            </p>
        </div>

        <!-- User Responsibilities Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                User Responsibilities
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                As a user of Amazon, you are expected to act responsibly and
                respect the rights of others. The following rules outline your
                responsibilities when using our services:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Account Security:</strong> You are responsible for
                    maintaining the confidentiality of your account information,
                    including your username and password. You agree to notify us
                    immediately of any unauthorized access or use of your
                    account.
                </li>
                <li class="mb-2">
                    <strong>Lawful Use:</strong> You agree to use our services
                    only for lawful purposes and in compliance with all
                    applicable laws and regulations. You may not use our
                    services to engage in any fraudulent, abusive, or illegal
                    activities.
                </li>
                <li class="mb-2">
                    <strong>Content Ownership:</strong> You retain ownership of
                    any content you submit or post through our services, but you
                    grant us a license to use, display, and distribute that
                    content in connection with our business operations.
                </li>
                <li class="mb-2">
                    <strong>Respect for Others:</strong> You agree not to
                    harass, threaten, or harm other users. Discriminatory,
                    offensive, or abusive behavior will not be tolerated.
                </li>
                <li class="mb-2">
                    <strong>Prohibited Actions:</strong> You may not interfere
                    with the functioning of our services, including but not
                    limited to hacking, introducing malware, or using automated
                    tools to scrape data.
                </li>
            </ul>
        </div>

        <!-- Intellectual Property Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Intellectual Property
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                All content, trademarks, and intellectual property on our
                website are owned by Amazon or our licensors. This includes, but
                is not limited to, text, graphics, logos, images, videos,
                software, and other materials.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Limited License:</strong> We grant you a limited,
                    non-exclusive, non-transferable license to access and use
                    our content for personal, non-commercial purposes. This
                    license does not permit you to copy, modify, distribute, or
                    create derivative works from our content without our express
                    written consent.
                </li>
                <li class="mb-2">
                    <strong>Trademark Usage:</strong> The Amazon name, logo, and
                    other trademarks are the property of Amazon. You may not use
                    our trademarks without our prior written permission.
                </li>
                <li class="mb-2">
                    <strong>Third-Party Content:</strong> Our website may
                    contain content owned by third parties. You agree to respect
                    the intellectual property rights of those third parties and
                    comply with any applicable terms of use.
                </li>
            </ul>
        </div>

        <!-- Purchasing and Payments Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Purchasing and Payments
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                If you make a purchase through our website, the following
                conditions apply to your transaction:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Pricing and Availability:</strong> All prices and
                    availability of products are subject to change without
                    notice. We strive to ensure the accuracy of product
                    descriptions, but we do not guarantee that descriptions are
                    error-free.
                </li>
                <li class="mb-2">
                    <strong>Payment Methods:</strong> We accept various payment
                    methods, including credit cards, debit cards, and other
                    electronic payment options. You agree to provide accurate
                    and complete payment information.
                </li>
                <li class="mb-2">
                    <strong>Order Confirmation:</strong> Once you place an
                    order, you will receive an email confirmation. Your order is
                    considered accepted when we send the confirmation, and at
                    that point, a binding contract is formed.
                </li>
                <li class="mb-2">
                    <strong>Shipping and Delivery:</strong> We will make
                    reasonable efforts to deliver your products within the
                    estimated delivery times. However, we are not liable for
                    delays beyond our control.
                </li>
                <li class="mb-2">
                    <strong>Returns and Refunds:</strong> Our return and refund
                    policy outlines the process for returning products and
                    receiving refunds. Please review this policy before making a
                    purchase.
                </li>
            </ul>
        </div>

        <!-- Limitation of Liability Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Limitation of Liability
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Amazon's liability is limited to the maximum extent permitted by
                law. The following conditions apply to our liability for your
                use of our services:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>No Warranties:</strong> Our services are provided
                    "as is" without any warranties, express or implied. We do
                    not guarantee that our services will be error-free, secure,
                    or uninterrupted.
                </li>
                <li class="mb-2">
                    <strong>Exclusion of Damages:</strong> We are not liable for
                    any indirect, incidental, consequential, or punitive damages
                    arising from your use of our services, even if we have been
                    advised of the possibility of such damages.
                </li>
                <li class="mb-2">
                    <strong>Cap on Liability:</strong> Our total liability to
                    you for any claim related to your use of our services is
                    limited to the amount you paid for the specific service or
                    product in question.
                </li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                Some jurisdictions do not allow the exclusion or limitation of
                certain damages, so these limitations may not apply to you.
            </p>
        </div>

        <!-- Termination Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">Termination</h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We reserve the right to suspend or terminate your access to our
                services at our discretion, with or without notice, for any
                violation of these Conditions and Rules of Use or any other
                reason we deem necessary.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Effect of Termination:</strong> Upon termination,
                    your right to use our services will immediately cease. Any
                    provisions of these conditions that are intended to survive
                    termination will remain in effect.
                </li>
                <li class="mb-2">
                    <strong>Reinstatement:</strong> If your account is
                    terminated, we may, at our discretion, reinstate your access
                    to our services, but we are under no obligation to do so.
                </li>
                <li class="mb-2">
                    <strong>Outstanding Obligations:</strong> Termination does
                    not relieve you of any obligations to pay any fees or
                    resolve any disputes that may have arisen before
                    termination.
                </li>
            </ul>
        </div>

        <!-- Governing Law and Dispute Resolution Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Governing Law and Dispute Resolution
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                These Conditions and Rules of Use are governed by the laws of
                the jurisdiction in which Amazon is headquartered. Any disputes
                arising from or related to these conditions will be resolved
                through binding arbitration, in accordance with the rules of the
                American Arbitration Association (AAA).
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Arbitration Agreement:</strong> By using our
                    services, you agree to resolve any disputes with us through
                    arbitration, rather than through court proceedings. This
                    means that you waive your right to a jury trial or to
                    participate in a class action.
                </li>
                <li class="mb-2">
                    <strong>Arbitration Process:</strong> The arbitration will
                    be conducted by a single arbitrator selected in accordance
                    with AAA rules. The arbitrator's decision will be final and
                    binding, and judgment may be entered in any court of
                    competent jurisdiction.
                </li>
                <li class="mb-2">
                    <strong>Exceptions to Arbitration:</strong> Notwithstanding
                    the above, we both retain the right to seek injunctive or
                    equitable relief in a court of law to prevent or stop a
                    breach of these conditions.
                </li>
            </ul>
        </div>

        <!-- Changes to These Conditions Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Changes to These Conditions
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We may update these Conditions and Rules of Use from time to
                time to reflect changes in our services, legal requirements, or
                other factors. When we make significant changes, we will notify
                you by updating the policy on our website and revising the "Last
                Updated" date at the top of this page.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                We encourage you to review these conditions periodically to stay
                informed about your rights and obligations. Your continued use
                of our services after any changes constitutes your acceptance of
                the updated terms.
            </p>
        </div>

        <!-- Contact Us Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">Contact Us</h2>
            <p class="mt-4 text-lg text-c-black-txt">
                If you have any questions or concerns about these Conditions and
                Rules of Use, please feel free to contact us at:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">Email: support@amazon.com</li>
                <li class="mb-2">Phone: +22 853 9234 99</li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                We are committed to addressing your inquiries promptly and
                ensuring that your experience with Amazon is positive and
                secure.
            </p>
        </div>
    </div>
</template>
