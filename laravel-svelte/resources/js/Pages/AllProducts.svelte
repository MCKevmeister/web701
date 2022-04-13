<script>
    import ProductCard from "./Components/ProductCard.svelte";
    import NavBar from "./Components/NavBar.svelte";

    //TODO: Replace hard coded data with API data
    let imageSource = "https://images.pexels.com/photos/704569/pexels-photo-704569.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
    let productName = "Food Basket";
    let productPrice = "100";
    let productLink = "https://www.google.com";

    let products = [
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
        {imageSource, productName, productPrice, productLink},
    ]
</script>

<NavBar/>

<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Products</h2>
    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        {#each products as product}
            <ProductCard {...product}/>
        {/each}
    </div>
</div>

