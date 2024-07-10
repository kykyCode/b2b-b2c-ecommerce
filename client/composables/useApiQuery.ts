interface Params {
    [key: string]: string | number | Array<string | number> | Array<string>;
}

export default function useApiQuery(params: Params | Ref<Params>) {
    const paramsRef = isRef(params) ? params : ref(params as Params);
    const config = useRuntimeConfig();

    const buildQueryString = (params: Params): string => {
        const queryArray: string[] = [];

        Object.keys(params).forEach((key) => {
            const value = params[key];
            if (Array.isArray(value)) {
                value.forEach((item) =>
                    queryArray.push(
                        `${encodeURIComponent(key)}[]=${encodeURIComponent(
                            item.toString()
                        )}`
                    )
                );
            } else {
                queryArray.push(
                    `${encodeURIComponent(key)}=${encodeURIComponent(
                        value.toString()
                    )}`
                );
            }
        });

        return queryArray.join("&");
    };

    const queryString = computed(() => buildQueryString(paramsRef.value));

    const apiUrl = computed(() => {
        const baseUrl = config.public.apiBaseUrl + "/api";
        return `${baseUrl}?${queryString.value}`;
    });

    return {
        queryString,
        apiUrl,
    };
}
