<template>
    <section class="my-5" v-if="!loading && post">
        <h1>{{ post.title }}</h1>

        <div class="post-info my-3" v-if="post.category">
            <h4><span class="badge badge-primary">{{ post.category.name }}</span></h4>
        </div>
        <div class="h5" v-if="post.tags.length > 0">
            <span class="badge badge-pills badge-info mr-2" v-for="tag in post.tags" :key="`tag-${tag.id}`">
                {{ tag.name }}
            </span>
        </div>

        <p class="my-4">{{ post.content }}</p>

        <router-link class="btn btn-primary" :to="{ name: 'blog' }">Torna al Blog</router-link>
    </section>
    <!-- <NotFound v-else-if="!post && loading" /> -->
    <Loader v-else />
</template>

<script>
import Loader from '../components/Loader.vue';
// import NotFound from './NotFound.vue';

export default {
    name: 'SinglePost',
    components: {
        Loader,
        // NotFound
    },
    data: function() {
        return {
            post: null,
            loading: true
        }
    },
    created: function() {
        this.getPost(this.$route.params.slug);
    },
    methods: {
        getPost: function(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/posts/${slug}`)
                .then(
                    res => {
                        this.post = res.data;
                        this.loading = false;
                    }
                )
                .catch(
                    err => {
                        console.log(err);
                    }
                );
        }
    }
}
</script>

<style lang="scss">

</style>