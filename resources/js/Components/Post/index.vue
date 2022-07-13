<template>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Post Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Post Body
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Created At
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in props.posts"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ post.id }}
                    </th>
                    <td class="py-4 px-6">
                        {{ post.title }}
                    </td>
                    <td class="py-4 px-6">
                        {{ post.body }}
                    </td>
                    <td class="py-4 px-6">
                        {{ post.created_at }}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <Link :href="route('posts.show', post.id)" class="font-medium px-6 text-blue-600 dark:text-blue-500 hover:underline" >
                            Edit
                        </Link>
                        <Link :href="route('posts.destroy', post.id)" method="delete" preserve-scroll  as="button" type="button" class="font-medium text-red-600 dark:text-blue-500 hover:underline" >
                            Delete
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['posts']);

</script>