type ToastType = "info" | "success" | "error";

interface ToastItem {
    text: string;
    type: ToastType;
}

const items: Ref<ToastItem[]> = ref([]);

export const useToasts = () => {
    const dismiss = (item: ToastItem): void => {
        const index = items.value.indexOf(item);
        if (index > -1) {
            items.value.splice(index, 1);
        }
    };

    const show = (type: ToastType, text: string): void => {
        const item: ToastItem = {
            text,
            type,
        };
        items.value.push(item);

        setTimeout(() => {
            dismiss(item);
        }, 5000);
    };

    const info = (text: string): void => {
        show("info", text);
    };

    const success = (text: string): void => {
        show("success", text);
    };

    const error = (text: string): void => {
        show("error", text);
    };

    return {
        info,
        success,
        error,
        dismiss,
        items: readonly(items),
    };
};
