<script>
    import NavBar from "./Components/NavBar.svelte"
    import {Link} from "@inertiajs/inertia-svelte";

    export let user = {
        id: null,
        name: null,
        email: null,
        accountType: null
    }
</script>

<NavBar/>

<div class="h-full bg-gray-50">
    <div class="min-h-full flex flex-col justify-center py-4 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="my-6 text-center text-3xl font-extrabold text-gray-900">Account Details</h2>
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                            <input id="name"
                                   name="name"
                                   type="text"
                                   autocomplete="name"
                                   readonly
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={user.name}>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                        <div class="mt-1">
                            <input id="email"
                                   name="email"
                                   type="email"
                                   autocomplete="email"
                                   readonly
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={user.email}>
                        </div>
                    </div>

                    <div>
                        <label for="accountType" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Account type </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input id="accountType"
                                   name="accountType"
                                   type="text"
                                   autocomplete="accountType"
                                   readonly
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={user.accountType}/>
                        </div>
                    </div>

                    {#if user != null && user.accountType === 'Food Producer'}
                        <div class="flex justify-end">
                            <Link href="/product/create"
                                  class="mt-4 w-full p-2 text-center text-white bg-indigo-500 rounded-md">
                                Add a new product
                            </Link>
                        </div>

                    {/if}
                    <div class="flex justify-end">
                        <button class="mt-4 w-full p-2 text-center text-white bg-indigo-500 rounded-md">
                            <a href="/account/edit/{user.id}">
                                <!--TODO: link to edit account page backend-->
                                Edit user details
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
