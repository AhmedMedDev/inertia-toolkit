<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';


defineProps({
    posts: Object
})
</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="" method="post">
                            <input type="text" placeholder="Enter title">
                            <input type="text" placeholder="Enter body">
                                <BreezeButton class="ml-4" >Log in</BreezeButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200" v-for="post in posts">
                            Title : {{post.title}} <br>
                            Body : {{post.body}} 
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
