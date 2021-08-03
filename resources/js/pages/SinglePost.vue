<template>
    <!-- <section class="my-5" v-if="!loading && JSON.stringify(post) != '{}'"> -->
    <section class="my-5" v-if="post">
        <h1>{{ post.title }}</h1>

        <div class="post-info my-3" v-if="post.category">
            <h4><router-link :to="{ name: 'category', params: { slug: post.category.slug }}" class="badge badge-primary">{{ post.category.name }}</router-link></h4>
        </div>
        <div class="h5" v-if="post.tags.length > 0">
            <router-link class="badge badge-pills badge-info mr-2" v-for="tag in post.tags" :key="`tag-${tag.id}`" :to="{ name: 'tag', params: { slug: tag.slug }}">{{ tag.name }}</router-link>
        </div>

        <p class="my-4">{{ post.content }}</p>

        <router-link class="btn btn-primary" :to="{ name: 'blog' }">Torna al Blog</router-link>
    </section>
    <!-- <NotFound v-else-if="JSON.stringify(post) == '{}' && !loading" /> -->
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
        }
    },
    created: function() {
        this.getPost();
    },
    methods: {
        getPost: function(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
                .then(
                    res => {
                        if (JSON.stringify(res.data) == '{}') {
                            this.$router.push({ name: 'not-found' })
                        } else {
                            this.post = res.data;
                            this.loading = false;
                        }
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