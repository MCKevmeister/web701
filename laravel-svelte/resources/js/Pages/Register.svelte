<script>
    import NavBar from "./Components/NavBar.svelte";
    import {useForm} from "@inertiajs/inertia-svelte";

    let userRegistrationForm = useForm({
        name: null,
        email: null,
        password: null,
        accountType: null,
    })

    function handleSubmit() {
        $userRegistrationForm.post("/register");
    }

</script>

<NavBar/>

<div class="h-full bg-gray-50">
    <div class="min-h-full flex flex-col justify-center py-4 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="my-6 text-center text-3xl font-extrabold text-gray-900">Register for an Account</h2>
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="flex justify-end text-sm">
                    <a href="/login" class="font-medium justify-end text-indigo-600 hover:text-indigo-500"> Already have an account, Login? </a>
                </div>
                <form class="space-y-6" on:submit|preventDefault={handleSubmit}>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                            <input id="name"
                                   name="name"
                                   type="text"
                                   autocomplete="name"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$userRegistrationForm.name}>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                        <div class="mt-1">
                            <input id="email"
                                   name="email"
                                   type="email"
                                   autocomplete="email"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$userRegistrationForm.email}>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password"
                                   name="password"
                                   type="password"
                                   autocomplete="current-password"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$userRegistrationForm.password}>
                        </div>
                    </div>
                    <div>
                        <label for="accountType" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Account type </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="accountType"
                                    name="accountType"
                                    autocomplete="accountType"
                                    class="mt-1 max-w-lg block focus:ring-indigo-500 focus:border-indigo-500
                                    w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                    bind:value={$userRegistrationForm.accountType}>
                                <option>Beneficiary</option>
                                <option>Volunteer</option>
                                <option>Food Producer</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent
                                    shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
