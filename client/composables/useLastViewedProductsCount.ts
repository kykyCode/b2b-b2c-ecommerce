import { computed } from "vue";
import { useWindowSize } from "@vueuse/core";

export function useLastViewedProductsCount() {
    const { width } = useWindowSize();

    const lastViewedProductsCount = computed(() => {
        if (width.value < 1024) {
            return 1;
        }
        if (width.value >= 1024 && width.value < 1280) {
            return 3;
        }
        if (width.value >= 1280 && width.value < 1536) {
            return 4;
        }
        if (width.value >= 1536) {
            return 5;
        }
        return 1;
    });

    return {
        lastViewedProductsCount,
    };
}
