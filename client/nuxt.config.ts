export default defineNuxtConfig({
    extractCSS: true,
    optimization: {
        splitChunks: {
            layouts: true,
            pages: true,
            commons: true,
        },
    },
    ssr: false,
    modules: [
        "@vueuse/nuxt",
        "@nuxt/image",
        "@nuxtjs/tailwindcss",
        "nuxt-icon",
        [
            "@nuxtjs/google-fonts",
            {
                families: {
                    Montserrat: {
                        wght: [300, 400, 500, 600, 700, 800, 900],
                    },
                },
            },
        ],
    ],
    runtimeConfig: {
        public: {
            apiBaseUrl: process.env.API_BASE_URL || "http://localhost:8080",
            apiBase: process.env.API_BASE_URL || "http://localhost:8080",
        },
    },
    nitro: {
        compressPublicAssets: true,
        devProxy: {},
    },
    imports: {
        dirs: [
            "types/*.ts",
            "composables/*.ts",
            "stores/*.ts",
            "middlewares/*.ts",
        ],
    },
    image: {
        staticFilename: "[publicPath]/images/[name]-[hash][ext]",
        domains: ["localhost"],
        alias: {
            images: "/images",
        },
    },
    experimental: {
        appManifest: false,
    },
});
