export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export interface Item {
    id: number;
    name: string;
    description: string;
    base_price: number;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};
