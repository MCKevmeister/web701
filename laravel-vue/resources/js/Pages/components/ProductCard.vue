<template>
    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
        <img :src="product.imageSource" :alt='"Picture of " + product.name' class="w-full h-full object-center object-cover lg:w-full lg:h-full" />
    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm text-gray-700">
                <Link href="/products" method="get" :data="{product: product.id}" class="absolute inset-0">
                    {{ product.name }}
                </Link>
            </h3>
        </div>
        <p class="text-sm font-medium text-gray-900">{{ product.price }} of Tokens</p>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'ProductCard',
    props: {
        product: {
            id: {
                type: String,
                required: true,
            },
            name: {
                type: String,
                required: true,
            },
            price: {
                type: Number,
                required: true,
            },
            imageSource: {
                type: String,
                required: true,
            },
        },
    },
    setup(props) {
        return {
            props,
            Link,
        };
    }
}
</script>

