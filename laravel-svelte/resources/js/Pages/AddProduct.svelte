<script>
    import NavBar from "./Components/NavBar.svelte";
    import {useForm} from "@inertiajs/inertia-svelte";

    let form = useForm({
        name: "",
        description: "",
        price: "",
        imageSource: "",
    })

    function handleSubmit() {
        $form.post("/products");
    }

</script>

<NavBar/>

<div class="h-full bg-gray-50">
    <div class="min-h-full flex flex-col justify-center py-4 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="my-6 text-center text-3xl font-extrabold text-gray-900">New Product</h2>
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" on:submit|preventDefault={handleSubmit}>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                            <input id="name"
                                   name="name"
                                   type="text"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$form.name}>
                        </div>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                        <div class="mt-1">
                            <textarea id="description"
                                      name="description"
                                      rows="4"
                                      required
                                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                      shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                      focus:border-indigo-500 sm:text-sm"
                                      bind:value={$form.description}></textarea>
                        </div>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
                        <div class="mt-1">
                            <input id="price"
                                   name="price"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$form.price}>
                        </div>
                    </div>
                    <div>
                        <label for="imageSource" class="block text-sm font-medium text-gray-700"> Image Source </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input id="imageSource"
                                   name="imageSource"
                                   type="text"
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md
                                   shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                                   focus:border-indigo-500 sm:text-sm"
                                   bind:value={$form.imageSource}>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent
                                    shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
