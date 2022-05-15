<script>
    import {inertia, page, Link} from '@inertiajs/inertia-svelte'

    let foodCharityLogo = "https://raw.githubusercontent.com/MCKevmeister/web701/main/laravel-svelte/resources/images/FoodCharityLogo.png"

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
                        <Link href="/"
                              class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Home
                        </Link>

                        <Link href="/products"
                              class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Products
                        </Link>

                        <Link href="/account"
                              class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Account
                        </Link>

                        {#if $page.props.user === null}
                            <Link href="/login"
                                  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Login
                            </Link>
                        {/if}

                        {#if $page.props.user != null}
                            <button use:inertia={{ href:'/logout', method: 'post', _blank: true }}
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Logout
                            </button>
                            {#if $page.props.user.accountType === 'Beneficiary'}
                                <Link href="/tokens"
                                      class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Tokens
                                </Link>
                            {/if}
                        {/if}



                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
