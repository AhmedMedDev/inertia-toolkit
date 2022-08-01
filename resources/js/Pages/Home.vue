<template>

    <MasterLayout>
        <template #header>Home</template>

            <div class="postBox m-auto" v-for="post in this.latestPosts" v-bind:key="post.id">
                <div class="header">
                    <div class="thum mr-2">
                        <img src="https://social.webestica.com/assets/images/avatar/04.jpg" alt="">
                    </div>
                    <div class="username">
                        Lorem ipsum dolor sit amet
                    </div>
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
export default {
    components : {
        Link,
        MasterLayout
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
                    }
            ]
        }
    }
}
</script>

<style scoped>
.postBox{
    width: 50%;
}
.header{
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.thum img{
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