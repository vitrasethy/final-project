<script>
import Layout from "../Layouts/NavLayout.vue";

export default {
    layout: Layout,
};
</script>

<script setup>
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

defineProps({
    carts: Array,
});

// onMounted(() => {
//     const productsID = JSON.parse(localStorage.getItem("productID")) || [];
//     if (productsID.length !== 0) {
//         router.post("/carts", {
//             products_id: productsID,
//         });
//     }
//     localStorage.removeItem("productID");
// });
</script>

<template>
    <div class="flex flex-col items-center justify-center">
        <div class="w-[50vw] shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            <span class="sr-only">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3">Product</th>
                        <th scope="col" class="px-6 py-3">Qty</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="cart in carts"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <td class="p-4">
                            <img
                                :src="cart.product.photo"
                                class="w-16 md:w-32 max-w-full max-h-full"
                                alt="Apple Watch"
                            />
                        </td>
                        <td
                            class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                        >
                            {{ cart.product.name }}
                        </td>
                        <td class="px-6 py-4">{{ cart.quantity }}</td>
                        <td
                            class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                        >
                            ${{ cart.product.price }}
                        </td>
                        <td class="px-6 py-4">
                            <Link
                                as="button"
                                method="delete"
                                :href="route('carts.destroy', cart.id)"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                >Remove
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button
            type="button"
            class="my-10 px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            Check Out
        </button>
    </div>
</template>
