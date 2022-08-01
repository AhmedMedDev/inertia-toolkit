<template>

    <MasterLayout>
        <template #header>Home</template>

            <div class="postBox m-auto relative" v-for="post in this.latestPosts" v-bind:key="post.id">
                <div class="header">
                    <img class="thum mr-2" src="https://social.webestica.com/assets/images/avatar/04.jpg" alt="">
                    <span class="username">
                        Lorem ipsum dolor sit amet
                    </span>
                    <Menu as="div" class=" absolute right-10">
                        <div>
                            <MenuButton class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                                More
                                <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
                            </MenuButton>
                        </div>

                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1">
                                    <MenuItem v-slot="{ active }">
                                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Edit ✍🏻</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Delete ❌</a>
                                    </MenuItem>
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
                <hr>
                <div class="postTitle">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis temporibus</p>
                </div>
                <div class="postImage">
                    <img src="https://social.webestica.com/assets/images/post/3by2/01.jpg" alt="">
                </div>
                <div class="actions flex items-cente">
                    <a class="mr-3" href="">Like 👍</a>
                    <a href="">Comment 🖊</a>
                </div>
            </div>
    </MasterLayout>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import MasterLayout from '@/Layouts/Master.vue';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/solid'
export default {
    components : {
        Link,
        MasterLayout,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        ChevronDownIcon,
    },
    data() {
        return {
                latestPosts : [
                    {
                        "id" : 1,
                        "userThum" : "https://social.webestica.com/assets/images/avatar/04.jpg",
                        "userName" : "Lorem ipsum dolor",
                        "postTitle" : "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis temporibus",
                        "postImage" : "https://social.webestica.com/assets/images/post/3by2/01.jpg",
                    },
                    {
                        "id" : 2,
                        "userThum" : "https://social.webestica.com/assets/images/avatar/04.jpg",
                        "userName" : "Lorem ipsum dolor",
                        "postTitle" : "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis temporibus",
                        "postImage" : "https://social.webestica.com/assets/images/post/3by2/01.jpg",
                    }
            ]
        }
    },
}
</script>

<style scoped>
.postBox{
    width: 50%;
    margin-bottom: 20px;
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 12px;
}
.header{
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.thum{
    width: 50px;
    border-radius: 50px;
}
.postTitle {
    margin: 15px 0;
}
.actions.flex.items-cente {
    margin-top: 16px;
}
</style>