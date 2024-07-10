const { setCart } = useCartStore();
const toasts = useToasts();

export const useCart = () => {
    const cart = ref([]);

    const addItem = async (productId: number): Promise<void> => {
        const { error } = await useMyFetch("/api/cart/add", {
            method: "POST",
            body: {
                id: productId,
                quantity: 1,
            },
            credentials: "include",
        });

        if (error.value) {
            console.error(
                "An error occurred while adding the product to cart:",
                error.value
            );
        }

        toasts.success("Product has been add to cart successfully");
        getCart();
    };

    const removeItem = async (productId: number): Promise<void> => {
        const { error } = await useMyFetch(`/api/cart/remove/${productId}`, {
            method: "DELETE",
            credentials: "include",
        });

        if (error.value) {
            console.error(
                "An error occurred while removing the product from cart:",
                error.value
            );
        }

        console.log("Product removed from cart successfully");
        getCart();
    };

    const getCart = async (): Promise<void> => {
        const { error } = await useMyFetch<CheckoutCart>("/api/cart", {
            credentials: "include",
            onResponse({ response }) {
                setCart(response._data);
            },
        });

        if (error.value) {
            console.error(
                "An error occurred while fetching the cart:",
                error.value
            );
        }
    };

    return {
        cart,
        addItem,
        removeItem,
        getCart,
    };
};
