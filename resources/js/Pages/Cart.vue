<script>
import Layout from "../Layouts/NavLayout.vue";

export default {
    layout: Layout,
};
</script>

<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { router } from "@inertiajs/vue3";

defineProps({
    carts: Array,
});

onMounted(() => {
    localStorage.removeItem("productID");
});

const handleCheckout = (carts) =>{
    if( carts === 0 ){
        return;
    }
    router.post("/checkout");
}

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
                            ${{ (cart.product.price) * (cart.quantity) }}
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
        <form @submit.prevent="handleCheckout(carts)">
            <button
                type="submit"
                :disabled="carts.length === 0"
                :class="[carts.length === 0 ? 'bg-gray-300' : 'bg-blue-700 hover:bg-blue-800', 'my-10 px-6 py-3.5 text-base font-medium text-white rounded-lg text-center']"
            >
                Check Out
            </button>
        </form>
    </div>
</template>
