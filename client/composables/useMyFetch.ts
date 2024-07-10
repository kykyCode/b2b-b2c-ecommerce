import type { UseFetchOptions } from "nuxt/app";
import { defu } from "defu";
import { computed } from "vue";

export function useMyFetch<T>(url: string, options: UseFetchOptions<T> = {}) {
    const config = useRuntimeConfig();

    let headers: any = {};

    const token = useCookie("XSRF-TOKEN");

    if (token.value) {
        headers["X-XSRF-TOKEN"] = token.value as string;
    }

    headers = {
        ...headers,
        ...useRequestHeaders(["cookie"]),
    };

    const baseURL = computed(() => config.public.apiBaseUrl);

    const defaults: UseFetchOptions<T> = {
        baseURL: baseURL.value as string,
        key: url,

        credentials: "include",

        headers: {
            Accept: "application/json",
            ...headers,
        },

        onResponse(_ctx) {
            // business function
        },

        onResponseError(_ctx) {
            // business error
        },
    };

    const params = defu(options, defaults);

    return useFetch(url, params);
}
