<template>

    <Head title="Dashboard" />

    <MasterLayout>
        <template #header>
            <h2 v-if="$page.props.flash.message">
                {{ $page.props.flash.message }}
            </h2>
            <h2 v-else>
                Dashboard
            </h2>
        </template>

        <!-- <div :class="[$page.props.flash.message ? 'active-alert' : '', 'flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800']" id="toast-success" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="ml-3 text-sm font-normal">Item moved successfully.</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div> -->
        <div id="toast-success" :class="[$page.props.flash.message ? 'active-alert' : '', 'flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200']" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                A simple info alert with an <a href="#" class="font-semibold underline hover:text-green-800 dark:hover:text-green-900">example link</a>. Give it a click if you like.
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="submit">
                        <div>
                            <label for="title">Title <span class="txt-red" v-if="errors.title">{{ errors.title
                            }}</span></label>
                            <input type="text" v-model="form.title"
                                class=" w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 " />
                        </div>
                        <div class="mt-4">
                            <label for="title">Description <span class="txt-red" v-if="errors.body">{{ errors.body
                            }}</span> </label>
                            <textarea name="description" type="text" v-model="form.body"
                                class=" w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </textarea>
                        </div>
                        <!-- submit -->
                        <div class="flex items-center mt-4">
                            <button :disabled="processing" class="mr-2 px-6 py-2 text-white bg-gray-900 rounded ">
                                Save
                            </button>
                            <div v-if="processing">
                                <svg role="status"
                                    class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="d-flex align-items">
                    <div class=" mb-6">
                            <input type="text" 
                            v-model="filters"
                            placeholder="Quick Search"
                            class=" w-full border-[#e3d7d7] text-gray-400 border-white-400 rounded focus:outline-none  " />
                    </div>
                    <pagination class="mb-6" :links="posts.links" />
                </div>
                <Posts :posts="posts.data" />
            </div>
        </div>


    </MasterLayout>
</template>
<style>
.d-flex {
    display: flex;
    justify-content: space-between;
}

.align-items {
    align-items: center;
}

.txt-red {
    color: red;
}
#toast-success{
    position: absolute;
    bottom: -100px;
    left: 39%;
    z-index: 99;
    transition: .5s ease;
}
.active-alert{
    bottom: 45px !important;
}
</style>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination';
import { Inertia } from '@inertiajs/inertia';
import MasterLayout from '@/Layouts/Master.vue';
import Posts from '@/Components/Post/index.vue';

export default {
    components: {
        Head,
        BreezeAuthenticatedLayout,
        Link,
        Pagination,
        useForm,
        MasterLayout,
        Posts
    },
    props: {
        posts: Object,
        errors: Object,
    },
    data() {
        return {
            form: useForm({
                title: null,
                body: null,
            }),
            processing: false,
            filters: null
        }
    },
    methods: {
        submit() {

            this.form.post(route('posts.store'), {
                onStart: () => this.loaderToggle(),
                onSuccess: () => this.form.reset(),
                onFinish: () => this.loaderToggle()
            })
        },
        loaderToggle() {

            this.processing = !this.processing
        }
    },
    mounted() {

    },
    watch: {

        filters: _.debounce(function (newVal) {

            Inertia.get('/dashboard', { search: this.filters }, {
                preserveState: true,
                replace: true,
                preserveScroll: true
            });
        }, 500)
    }
}
</script>