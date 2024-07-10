export default defineNuxtRouteMiddleware(async (to, from) => {
    if (import.meta.client) {
        const { user } = useUserStore();
        const { me } = useAuth();

        if (!user.value || !user.value.id) {
            await me();

            if (!user.value || !user.value.id) {
                return navigateTo("/auth/login");
            }
        }
    }
});
