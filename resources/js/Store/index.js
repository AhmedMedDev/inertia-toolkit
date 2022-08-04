import axios from 'axios'
import { createStore } from 'vuex'

const store = new createStore({
    state : {
        csrf_token : '',
        posts : [],
        selectedPost: {},
    },
    mutations: {
        set_csrf (state, csrf_token) {
            state.csrf_token = csrf_token
            // window.axios.defaults.headers.common['Authorization'] =  `Bearer ${csrf_token}`
        },
        set_posts (state, posts) {
            state.posts = posts
        }
    },
    actions: {
        fetchPosts (state) {
            
            axios.get('/posts')
            .then((res) => state.commit('set_posts', res.data.payload))
            .catch((err) => console.log(err))
        }
    }
})

export default store