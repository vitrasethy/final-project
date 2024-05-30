<script setup>
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const handleCart = () => {
    const productsID = JSON.parse(localStorage.getItem("productID")) || [];
    if (productsID.length !== 0) {
        router.post("/carts", {
            products_id: productsID,
        });
    }
    router.get("/carts");
};
</script>

<template>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg"
                    class="h-8"
                    alt="Apple Logo"
                />
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                    >Apple</span
                >
            </a>
            <div class="hidden w-full md:block md:w-auto">
                <ul
                    class="flex flex-col items-center font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <li>
                        <Link
                            href="/"
                            as="button"
                            class="block py-2 px-3 bg-blue-700 rounded md:bg-transparent md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            :class="
                                $page.component === 'Welcome'
                                    ? 'text-blue-700'
                                    : 'text-black'
                            "
                            aria-current="page"
                            >Home
                        </Link>
                    </li>
                    <li>
                        <button
                            @click="handleCart"
                            class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            :class="
                                $page.component === 'Cart'
                                    ? 'text-blue-700'
                                    : 'text-black'
                            "
                        >
                            Cart
                        </button>
                    </li>
                    <li v-if="!$page.props.auth.user">
                        <a
                            href="/google/redirect"
                            class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55"
                        >
                            <svg
                                class="w-4 h-4 me-2"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 18 19"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            Sign in with Google
                        </a>
                    </li>
                    <li v-else>
                        <Link
                            :href="route('logout')"
                            method="POST"
                            as="button"
                            class="block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page"
                            >Logout
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <slot />
</template>
