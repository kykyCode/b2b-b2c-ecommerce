export function useCartStore() {
    const cart = useState("cart", () => ({}));

    const setCart = (data: CheckoutCart) => {
        cart.value = { ...data };
    };

    const setPaymentMethod = (data: string) => {
        cart.value = { ...cart.value, paymentMethod: data };
    };

    const setShippingMethod = (data: string) => {
        if (data == "delivery") {
            cart.value = {
                ...cart.value,
                shippingPrice: 20,
                shippingMethod: data,
            };
        } else {
            cart.value = {
                ...cart.value,
                shippingPrice: 0,
                shippingMethod: data,
            };
        }
    };

    return {
        cart,
        setCart,
        setShippingMethod,
        setPaymentMethod,
    };
}
