<script>
import NavBar from "./Components/NavBar.svelte";
import {page, useForm} from "@inertiajs/inertia-svelte";


let tokenForm = useForm({
    value: null,
    user_id: $page.props.user.user_id,
})

function handleSubmit() {
    $tokenForm.post("/tokens");
}
</script>

<NavBar/>


<div class="h-full bg-gray-50">
    <div class="min-h-full flex flex-col justify-center py-4 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="my-6 text-center text-3xl font-extrabold text-gray-900">Get a Token</h2>
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" on:submit|preventDefault={handleSubmit}>
                    <div>
                        <label for="value" class="block text-sm font-medium text-gray-700"> Value </label>
                        <div class="mt-1">
                            <input id="value"
                                   name="value"
                                   type="number"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$tokenForm.value}>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent
                                    shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Get Token
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
