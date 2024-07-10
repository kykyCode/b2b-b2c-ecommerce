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
            Investor Relations
        </h1>

        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Introduction
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                At Amazon, we are committed to creating long-term value for our
                shareholders. Our Investor Relations page is designed to provide
                you with comprehensive information about our financial
                performance, business strategy, corporate governance, and other
                key aspects of our operations. Whether you are a current
                investor or considering an investment in Amazon, we aim to equip
                you with the insights and resources you need to make informed
                decisions.
            </p>
            <p class="mt-4 text-lg text-c-black-txt">
                We prioritize transparency, accountability, and open
                communication with our shareholders. This page serves as a
                central hub for the latest financial reports, investor
                presentations, stock information, and more. We encourage you to
                explore the content provided here and reach out to our Investor
                Relations team if you have any questions.
            </p>
        </div>

        <!-- Financial Performance Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Financial Performance
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Amazon's financial performance reflects our commitment to
                driving sustainable growth and delivering value to our
                shareholders. We provide regular updates on our financial
                results through quarterly earnings reports, annual reports, and
                other financial disclosures.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Quarterly Earnings Reports:</strong> Our quarterly
                    earnings reports provide a detailed overview of our
                    financial performance, including revenue, profit margins,
                    and key business metrics. These reports are accompanied by
                    earnings calls, where our leadership team discusses the
                    results and answers questions from analysts and investors.
                </li>
                <li class="mb-2">
                    <strong>Annual Reports:</strong> Our annual reports offer a
                    comprehensive summary of our financial and operational
                    performance over the fiscal year. These reports include
                    financial statements, management's discussion and analysis,
                    and insights into our long-term strategy.
                </li>
                <li class="mb-2">
                    <strong>SEC Filings:</strong> We regularly file reports with
                    the U.S. Securities and Exchange Commission (SEC), including
                    10-K, 10-Q, and 8-K filings. These documents provide
                    important information about our financial condition, risks,
                    and business operations.
                </li>
            </ul>
        </div>

        <!-- Business Strategy Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Business Strategy
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Our business strategy is focused on long-term growth,
                innovation, and customer satisfaction. We believe that by
                investing in our customers, technology, and infrastructure, we
                can continue to build a company that delivers exceptional value
                to shareholders and stakeholders alike.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Customer-Centric Approach:</strong> At Amazon, our
                    customers are at the heart of everything we do. We are
                    committed to understanding and meeting their needs through
                    constant innovation and improvement in our products and
                    services.
                </li>
                <li class="mb-2">
                    <strong>Technology and Innovation:</strong> We invest
                    heavily in research and development to stay at the forefront
                    of technological advancements. From cloud computing to
                    artificial intelligence, we are focused on leveraging
                    technology to drive growth and efficiency.
                </li>
                <li class="mb-2">
                    <strong>Global Expansion:</strong> We continue to expand our
                    presence in international markets, seeking opportunities to
                    grow our business and reach new customers around the world.
                </li>
                <li class="mb-2">
                    <strong>Sustainability and Social Responsibility:</strong>
                    We are committed to sustainable practices and social
                    responsibility. Our initiatives focus on reducing our
                    environmental impact, supporting communities, and promoting
                    ethical business practices.
                </li>
            </ul>
        </div>

        <!-- Stock Information Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Stock Information
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Amazon's stock is publicly traded on the NASDAQ under the ticker
                symbol "AMZN." Below is an overview of key stock information and
                resources for investors:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Stock Price:</strong> Stay updated with the latest
                    stock price, historical data, and market performance through
                    our real-time stock chart.
                </li>
                <li class="mb-2">
                    <strong>Dividend Policy:</strong> Amazon does not currently
                    pay dividends. We reinvest our profits into the business to
                    drive growth and innovation.
                </li>
                <li class="mb-2">
                    <strong>Shareholder Services:</strong> Our transfer agent
                    provides services to shareholders, including account
                    management, dividend reinvestment, and assistance with stock
                    transfers.
                </li>
                <li class="mb-2">
                    <strong>Analyst Coverage:</strong> We are covered by a wide
                    range of financial analysts who provide insights and
                    recommendations on our stock. Access reports and analyses
                    from leading research firms.
                </li>
            </ul>
        </div>

        <!-- Corporate Governance Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Corporate Governance
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Amazon is committed to maintaining the highest standards of
                corporate governance. We believe that strong governance
                practices are essential to managing risk, promoting ethical
                behavior, and ensuring long-term success.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Board of Directors:</strong> Our Board of Directors
                    is composed of experienced leaders who provide oversight and
                    strategic guidance. Learn more about our board members and
                    their roles.
                </li>
                <li class="mb-2">
                    <strong>Committees:</strong> The board is supported by
                    various committees, including Audit, Compensation, and
                    Nominating and Governance Committees. These committees
                    ensure that we operate with integrity and transparency.
                </li>
                <li class="mb-2">
                    <strong>Code of Conduct:</strong> Our Code of Business
                    Conduct and Ethics sets the standard for how we conduct
                    business. It applies to all employees, officers, and
                    directors, ensuring that we uphold our values in every
                    aspect of our operations.
                </li>
                <li class="mb-2">
                    <strong>Shareholder Engagement:</strong> We actively engage
                    with our shareholders to understand their perspectives and
                    address their concerns. Our commitment to open dialogue
                    ensures that we remain aligned with our investors'
                    interests.
                </li>
            </ul>
        </div>

        <!-- Sustainability and ESG Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Sustainability and ESG
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Environmental, Social, and Governance (ESG) factors are integral
                to Amazon's strategy and operations. We are dedicated to
                building a sustainable future by focusing on key ESG initiatives
                that benefit our business, our customers, and the planet.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Climate Pledge:</strong> Amazon has committed to
                    achieving net-zero carbon by 2040, 10 years ahead of the
                    Paris Agreement. We are taking bold steps to reduce our
                    carbon footprint across our operations.
                </li>
                <li class="mb-2">
                    <strong>Renewable Energy:</strong> We are the largest
                    corporate purchaser of renewable energy in the world. Our
                    goal is to power our operations with 100% renewable energy
                    by 2025.
                </li>
                <li class="mb-2">
                    <strong>Community Impact:</strong> We invest in initiatives
                    that support communities, from providing disaster relief to
                    supporting education and workforce development programs.
                </li>
                <li class="mb-2">
                    <strong>Governance and Ethics:</strong> We are committed to
                    ethical business practices, transparency, and
                    accountability. Our ESG reports provide detailed insights
                    into our progress and future goals.
                </li>
            </ul>
        </div>

        <!-- Investor Resources Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Investor Resources
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                We provide a wide range of resources to help you stay informed
                about Amazon's performance and growth prospects. Whether you are
                a new investor or a long-term shareholder, these tools and
                reports will keep you updated.
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">
                    <strong>Investor Presentations:</strong> Access our latest
                    investor presentations for insights into our business
                    strategy, financial performance, and future outlook.
                </li>
                <li class="mb-2">
                    <strong>Financial Reports:</strong> Review our quarterly and
                    annual financial reports, including income statements,
                    balance sheets, and cash flow statements.
                </li>
                <li class="mb-2">
                    <strong>Press Releases:</strong> Stay informed with our
                    latest press releases covering financial results, business
                    developments, and other key announcements.
                </li>
                <li class="mb-2">
                    <strong>Frequently Asked Questions:</strong> Find answers to
                    common questions about our stock, financials, and investor
                    services.
                </li>
            </ul>
        </div>

        <!-- Contact Investor Relations Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-semibold text-c-black-txt">
                Contact Investor Relations
            </h2>
            <p class="mt-4 text-lg text-c-black-txt">
                Our Investor Relations team is here to assist you with any
                inquiries or requests for additional information. Please feel
                free to reach out to us using the contact details below:
            </p>
            <ul class="list-disc ml-8 mt-4 text-lg text-c-black-txt">
                <li class="mb-2">Email: investorrelations@amazon.com</li>
                <li class="mb-2">Phone: +22 853 9234 89</li>
            </ul>
            <p class="mt-4 text-lg text-c-black-txt">
                We are committed to providing timely and accurate information to
                our shareholders and look forward to assisting you with your
                investment-related needs.
            </p>
        </div>
    </div>
</template>
