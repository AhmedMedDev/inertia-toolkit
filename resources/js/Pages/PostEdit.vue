<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import MasterLayout from '@/Layouts/Master.vue';

const props = defineProps(['post','errors']);

const form = useForm({
    title: props.post.title,
    body: props.post.body
});

const submit = () => {
    form.put(route('posts.update', props.post.id));
};
</script>

<template>

    <Head title="Dashboard" />

    <MasterLayout>
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
                                <label for="title">Title  <span class="txt-red" v-if="errors.title">{{ errors.title }}</span></label>
                                <input type="text" v-model="form.title"
                                    class=" w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 " />
                            </div>
                            <div class="mt-4">
                                <label for="title">Description  <span class="txt-red" v-if="errors.body">{{ errors.body }}</span> </label>
                                <textarea name="description" type="text" v-model="form.body"
                                    class=" w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </textarea>
                            </div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button class="px-6 py-2 text-white bg-gray-900 rounded ">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </MasterLayout>
</template>