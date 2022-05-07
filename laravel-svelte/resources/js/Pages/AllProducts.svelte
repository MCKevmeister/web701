<script>
    import ProductCard from "./Components/ProductCard.svelte";
    import NavBar from "./Components/NavBar.svelte";
    import {Inertia} from "@inertiajs/inertia";
    import {throttle} from "lodash";

    export let products;
    export let searchQuery;
    export let user;

    const search = throttle(() => {
        Inertia.get('/products', {searchQuery}, {
            preserveState: true,
            replace: true
        });
    }, 500);
</script>

<NavBar/>

<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Products</h2>

    <!--If user type is 'food producer', show a button to add a new product-->
    <div class="flex justify-end">
        {#if (user.type === 'Food Producer')}
            <a href="/product/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add a new product
            </a>
        {/if}

    <!--Search Bar-->
    <div class="search text-right mr-12 font-medium text-xl mt-10 2xs:mt-3 2xs:mr-0 2xs:text-center">
        <input type="text" placeholder="Search..." class="border px-2 rounded-lg" bind:value={$searchQuery}>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        {#if products.length > 0}
            {#each products as product}
                <ProductCard {...product}/>
            {/each}
        {:else}
            <div class="text-center">
                <h3 class="text-lg font-medium text-gray-900">No products found</h3>
            </div>
        {/if}
    </div>
</div>

</div>
