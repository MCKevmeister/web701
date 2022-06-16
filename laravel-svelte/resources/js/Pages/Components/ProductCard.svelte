<script>
    import {Link} from '@inertiajs/inertia-svelte'

    export let id
    export let imageSource;
    export let name;
    export let price;
</script>

<div class="group relative">
    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
        <img src="{imageSource}" alt="Picture of {name}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm font-medium text-gray-900">
                <Link href="/products/{id}" method="get">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {name}
                </Link>
            </h3>
        </div>
        <p class="text-sm font-medium text-gray-900">${price} of Tokens</p>
    </div>
</div>
