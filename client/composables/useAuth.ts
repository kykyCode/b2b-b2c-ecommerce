interface UserBaseData {
    name: string;
    email: string;
}

interface UserRegistrationData extends UserBaseData {
    password: string;
    password_confirmation: string;
}

interface UserLoginData extends UserBaseData {}

interface ApiResponse<T> {
    data: T;
    error: {
        message: string;
    } | null;
    status: number;
}

export function useAuth() {
    const { setUser } = useUserStore();

    const register = async (userData: UserRegistrationData) => {
        try {
            const response = await useMyFetch<
                ApiResponse<UserRegistrationData>
            >("/api/register", {
                credentials: "include",
                method: "POST",
                body: userData,
            });

            if (response.error && response.error.value) {
                throw new Error(response.error.value.message);
            }

            return response;
        } catch (error: any) {
            console.error("Registration failed:", error.message);
            throw error;
        }
    };

    const login = async (userData: UserLoginData) => {
        try {
            const { data, error } = await useMyFetch<
                ApiResponse<UserLoginData>
            >("api/login", {
                credentials: "include",
                method: "POST",
                body: userData,
            });

            if (error && error.value) {
                throw new Error(error.value.message);
            }

            if (data && data.value) {
                setUser(data.value.user);
            } else {
                throw new Error("No user data returned");
            }
        } catch (error: any) {
            console.error("Login failed:", error.message);
            throw error;
        }
    };

    const me = async () => {
        try {
            const response = await useMyFetch<ApiResponse<User>>("api/me", {
                credentials: "include",
                method: "GET",
            });

            if (response.error && response.error.value) {
                throw new Error(response.error.value.message);
            }

            if (response.data && response.data._value) {
                setUser(response.data._value.user);
            } else {
                throw new Error("No user data returned");
            }

            return response;
        } catch (error: any) {
            console.error("Unauthenticated:", error.message);
            throw error;
        }
    };

    return {
        register,
        login,
        me,
    };
}
