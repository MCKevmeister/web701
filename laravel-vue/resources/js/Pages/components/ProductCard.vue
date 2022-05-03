<template>
    <div class="group relative">
        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
            <img v-bind:src='product.imageSource' v-bind:alt='"Picture of " + product.name' class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        </div>
        <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-gray-700">
                    <a v-bind:href="product.link">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ product.name }}
                    </a>
                </h3>
            </div>
            <p class="text-sm font-medium text-gray-900">${{ product.price }} of Tokens</p>
        </div>
    </div>
</template>

<script>

export default {
    name: 'ProductCard',
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        return {
            props
        }
    }
}
</script>

