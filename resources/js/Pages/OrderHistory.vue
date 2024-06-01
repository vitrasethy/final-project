<script>
import Layout from "../Layouts/NavLayout.vue";

export default {
    layout: Layout,
};
</script>

<script setup>
defineProps({
    orders: Array,
});
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
                        <th scope="col" class="px-6 py-3">Purchased Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="order in orders"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <td class="p-4">
                            <img
                                :src="order.product.photo"
                                class="w-16 md:w-32 max-w-full max-h-full"
                                alt="Apple Watch"
                            />
                        </td>
                        <td
                            class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                        >
                            {{ order.product.name }}
                        </td>
                        <td class="px-6 py-4">{{ order.quantity }}</td>
                        <td
                            class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                        >
                            ${{ (order.product.price) * (order.quantity) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ order.created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
