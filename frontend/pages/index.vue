<script setup>
import useApiFetch from "~/composables/useApiFetch.js";

const products = ref([]);
const token = ref(null)
const { createToken } = useToken();
const getToken = async () => {
    token.value = await createToken();
}
const productsLoader = async () => {
    const {data, error} = await useApiFetch(`/api/products?token=${token.value}`);

    if (error.value) {
        console.error(error.value)
        return;
    }

    products.value = data.value.products;
}
await getToken()
await productsLoader();

</script>
<template>
    <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
        <Product
            v-for="product in products"
            :key="product.id"
            :product="product"
        />
    </div>
</template>