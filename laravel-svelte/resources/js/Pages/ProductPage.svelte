<script>
    import {Inertia} from "@inertiajs/inertia";

    export let product = {
        id: null,
        imageSource: null,
        productName: null,
        productPrice: null,
        productDescription: null
    }

    function handleSubmit() {
        Inertia.post('/order', product.id);
    }
</script>


<div class="bg-white">
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            <!-- Product Image -->
            <div class="flex flex-col-reverse">
                <div class="w-full aspect-w-1 aspect-h-1">
                    <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <img src="{product.imageSource}"
                             alt="Picture of {product.productName}"
                             class="w-full h-96 object-center object-cover sm:rounded-lg">
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{product.productName}</h1>
                <div class="mt-3">
                    <h3 class="sr-only">Price</h3>
                    <p class="text-3xl text-gray-900">${product.productPrice} of Tokens</p>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Description</h3>
                    <div class="text-base text-gray-700 space-y-6">
                        <p>{product.productDescription}</p>
                    </div>
                </div>

                <form class="mt-6" on:submit|preventDefault={handleSubmit}>
                    <div class="mt-10 flex sm:flex-col1">
                        <button type="submit"
                                class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8
                                flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50
                                focus:ring-indigo-500 sm:w-full">
                            Purchase with Tokens
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


// TODO: pass props from API
// export let imageSource = "https://images.pexels.com/photos/704569/pexels-photo-704569.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
// export let productName = "Food Basket"
// export let productPrice = 100
// export let productDescription = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor " +
//     "incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco " +
//     "laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit " +
//     "esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa q" +
//     "ui officia deserunt mollit anim id est laborum."
