export function useUserStore() {
    const user = useState("user", () => ({}));

    const setUser = (data: User) => {
        user.value = { ...data };
    };

    return {
        user,
        setUser,
    };
}
