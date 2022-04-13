<script>
    let foodCharityLogo = "https://raw.githubusercontent.com/MCKevmeister/web701/main/laravel-svelte/resources/images/FoodCharityLogo.png";
</script>

<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <!--TODO-->
                    <img class="block lg:hidden h-8 w-auto" src={foodCharityLogo} alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src={foodCharityLogo} alt="Workflow">
                </div>
                <div class="sm:block sm:ml-6">
                    <div class="flex space-x-4">

                        <a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>

                        <a href="/products" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>

                        <a href="/account" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Account</a>

                        <a href="/login" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
