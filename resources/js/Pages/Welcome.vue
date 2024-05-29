<script>
import Layout from "../Layouts/NavLayout.vue";

export default {
    layout: Layout,
};
</script>

<script setup>
import Button from "primevue/button";
import { useToast } from "primevue/usetoast";
import Toast from "primevue/toast";

defineProps({
    products: Array,
});

const toast = useToast();

const handleCart = (productID) => {
    const productsID = JSON.parse(localStorage.getItem("productID")) || [];
    productsID.push(productID);
    localStorage.setItem("productID", JSON.stringify(productsID));
    toast.add({
        severity: "success",
        summary: "Add to cart is success",
        detail: "Your item has been add to cart successfully",
        life: 3000,
    });
};
</script>

<template>
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-4">
            <div
                v-for="product in products"
                class="w-full max-w-sm bg-[#f6f5f8] border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            >
                <a href="#">
                    <img
                        class="rounded-t-lg"
                        :src="product.photo"
                        alt="apple"
                    />
                </a>
                <div class="px-5 pb-5">
                    <h5
                        class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"
                    >
                        {{ product.name }}
                    </h5>

                    <div class="flex items-center justify-between">
                        <Toast />
                        <span
                            class="text-3xl font-bold text-gray-900 dark:text-white"
                            >${{ product.price }}</span
                        >
                        <button
                            @click="handleCart(product.id)"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
