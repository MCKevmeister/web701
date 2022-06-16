<script>
    import ProductCard from "./Components/ProductCard.svelte";
    import NavBar from "./Components/NavBar.svelte";

    export let products = [];
    export let searchQuery = "";

    let filteredProducts =[];

    const searchProducts = () => {
        filteredProducts = products.filter(product => {
            return product.name.toLowerCase().includes(searchQuery.toLowerCase());
        });
    };
</script>

<NavBar/>

<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <div>
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Products</h2>
    </div>

    <div class="flex justify-end">

        <!--Search Bar-->
        <div class="search text-right mr-12 font-medium text-xl mt-10 2xs:mt-3 2xs:mr-0 2xs:text-center">
            <input type="text"
                   placeholder="Search..."
                   class="border px-2 rounded-lg"
                   bind:value={searchQuery}
                   on:input={searchProducts}>
        </div>
    </div>
    <!-- Displays products based on search query -->
    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        {#if searchQuery && filteredProducts.length === 0}
            <div class="text-center">
                <h3 class="text-lg font-medium text-gray-900">No products found</h3>
            </div>
        {:else if filteredProducts.length > 0}
            {#each filteredProducts as product}
                <ProductCard {...product}/>
            {/each}
        {:else}
            {#each products as product}
                <ProductCard {...product}/>
            {/each}
        {/if}
    </div>
</div>
