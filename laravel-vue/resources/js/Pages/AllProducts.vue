<template>
    <NavBar></NavBar>

    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div>
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Products</h2>
        </div>

        <div class="flex justify-end">

            <!--Search Bar-->
            <div class="search text-right mr-12 font-medium text-xl mt-10 2xs:mt-3 2xs:mr-0 2xs:text-center">
                <input type="text" placeholder="Search..." class="border px-2 rounded-lg">
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
             v-for="product in products">
            <ProductCard v-bind:product="product" />
        </div>
    </div>
</template>

<script setup>
import NavBar from './components/NavBar.vue';
import ProductCard from "./components/ProductCard.vue";

let props = defineProps({
    products: Object,
    filters: Object,
    auth: Object,
});

</script>
