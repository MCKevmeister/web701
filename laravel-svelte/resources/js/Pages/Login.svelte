<script>
    import NavBar from "./Components/NavBar.svelte";
    import {useForm} from "@inertiajs/inertia-svelte";

    export let errors = {}

    let form = useForm({
        email: null,
        password: null,
    })

    function handleLoginSubmit() {
        $form.post('/login');
    }
</script>

<NavBar/>
<div class="h-full bg-gray-50">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" on:submit|preventDefault={handleLoginSubmit}>
                    <div>
                        <label for="email"
                               class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input bind:value={$form.email}
                                   id="email"
                                   name="email"
                                   type="email"
                                   autocomplete="email"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm" />
                        </div>
                        {#if errors.name}<div>{errors.name}</div>{/if}
                    </div>

                    <div>
                        <label for="password"
                               class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password"
                                   name="password"
                                   type="password"
                                   autocomplete="current-password"
                                   required class="appearance-none block w-full px-3 py-2 border border-gray-300
                                   rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$form.password}/>
                        </div>
                        {#if errors.password}<div>{errors.password}</div>{/if}
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me"
                                   name="remember-me"
                                   type="checkbox"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember-me"
                                   class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="/register"
                               class="font-medium text-indigo-600 hover:text-indigo-500">
                                Create an Account?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md
                                shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                disabled={$form.processing}>
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

