<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import Pagination  from '@/Components/Pagination';

const props = defineProps(['posts']);

const form = useForm({
    title: '',
    body: '',
});

const submit = () => {
    form.post(route('posts.store'));
};
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
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title"
                                    class=" w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 " />
                            </div>
                            <div class="mt-4">
                                <label for="title">Description</label>
                                <textarea name="description" type="text" v-model="form.body"
                                    class=" w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </textarea>
                            </div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button class="px-6 py-2 text-white bg-gray-900 rounded ">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <pagination class="mt-6" :links="props.posts.links" />
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200" v-for="post in props.posts.data">
                        Title : {{ post.title }} <br>
                        Body : {{ post.body }}
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
