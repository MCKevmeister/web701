<script>
    import { Link } from '@inertiajs/inertia-svelte'

    let foodCharityLogo = "https://raw.githubusercontent.com/MCKevmeister/web701/main/laravel-svelte/resources/images/FoodCharityLogo.png";
    // export let auth = null;
</script>

<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-8 w-auto" src={foodCharityLogo} alt="Food Charity Logo">
                </div>
                <div class="sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <Link href="/public" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</Link>

                        <Link href="/products" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</Link>

                        <Link href="/account" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Account</Link>

                        <Link href="/login" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</Link>
                        <!--{#if auth.id}-->
                        <!--    <Link href="/logout" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</Link>-->
                        <!--{/if}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
