import type { RouteLocationRaw } from "vue-router";

export interface LanguageData {
    en: string;
    [key: string]: string;
}

export interface Product {
    id: number;
    sku: string;
    name: LanguageData;
    desc: LanguageData;
    main_image: string;
    images: string[];
    catalogue_price: number;
    brand: string;
    parent_id: number | null;
    created_at: string;
    updated_at: string;
    is_active: Boolean;
    group: string;
    stripe_product_id: string;
    stripe_price_id: string;
    reviews_count: number;
    reviews_avg: number;
    is_favorite: boolean;
    categories?: Array<Category>;
}

export interface CheckoutCartItem {
    product: Product;
    quantity: number;
    total_item_price: number;
}

export interface CheckoutCart {
    items: Array<CheckoutCartItem>;
    total: number;
    total_items_price: number;
    payment_key: string | null;
    shipment_key: string | null;
    shipment_price: number;
}

export interface BreadcrumbsItem {
    name: string;
    to?: RouteLocationRaw;
}

export interface Category {
    name: LanguageData;
    description: LanguageData;
    slug: string;
    subcategories: Array<Category>;
}

export interface ListingProduct {
    id: string;
    name: LanguageData;
    description: LanguageData;
    main_image: string;
    catalogue_price: Number;
    images: Array<string>;
}

export interface ApiPaginationLinks {
    url: string | null;
    label: string;
    active: boolean;
}

export interface ApiPaginationResponse<T> {
    current_page: number;
    data: T[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: ApiPaginationLinks[];
    next_page_url: string | null;
    path: string;
    per_page: number;
    prev_page_url: string | null;
    to: number;
    total: number;
}

export interface Review {
    rating: string;

    content: string;
    user: User;
}

export interface Attribute {
    id: number;
    name: LanguageData;
    pivot: any;
}

export interface RelatedProduct {
    id: string;
    main_image: string;
    category_slug: string;
}

// UPDATE NEW

export interface CatalogCategory {
    slug: string;
    name: LanguageData;
}

export interface CatalogDepartment {
    key: string;
    name: LanguageData;
    categories: CatalogCategory[];
}

export interface Address {
    firstName: string;
    lastName: string;
    email: string;
    phoneNumber: string;
    addressLine1: string;
    addressLine2: string;
    city: string;
    zip: string;
    country: string;
}

export interface Notification {
    id: number;
    title: string;
    content: string;
    is_read: boolean;
    created_at: string;
}

export interface User {
    id: number;
    first_name: string;
    last_name: string;
    avatar: string;
    email: string;
    default_address: Address;
    notification_count: number;
}

export interface OrderItem {
    id: number;
    order_id: number;
    product_id: number;
    quantity: number;
    custom_price: number | null;
    notes: string | null;
    created_at: string;
    updated_at: string;
    total: string;
}

export interface Payment {
    id: number;
    payment_method_id: number;
    order_id: number;
    paid: boolean;
    total: number;
    created_at: string;
    updated_at: string;
    checkout_session_id: string;
    checkout_session_url: string;
    status: string;
    payment_method: string | null;
}

export interface Order {
    id: number;
    user_id: number;
    status: string;
    created_at: string;
    updated_at: string;
    notes: string;
    total: string;
    address_data: Address;
    items: OrderItem[];
    user: User;
    payment: Payment;
}

export interface Department {
    id: number;
    name: LanguageData;
    description: LanguageData;
    key: string;
    main_image: string;
}
