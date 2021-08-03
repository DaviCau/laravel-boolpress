<template>
    <section v-if="tag" class="my-5">
        <h1>Post appartenenti al tag: <span class="badge badge-info badge-pills">{{ tag.name }}</span></h1>

        <ul v-if="tag.posts.length > 0">
            <li v-for="post in tag.posts" :key="`post-${post.id}`">
                <router-link :to="{ name: 'single-post', params: { slug: post.slug}}">{{ post.title }}</router-link>
            </li>
        </ul>
        <h3 v-else class="text-danger">Nessuno</h3>
    </section>
    <Loader v-else />
</template>

<script>
import Loader from '../components/Loader.vue'

export default {
    name: "Tag",
    components: {
        Loader
    },
    data: function() {
        return {
            tag: null
        }
    },
    created: function() {
        this.getTag();
    },
    methods: {
        getTag: function() {
            axios
                .get(`http://127.0.0.1:8000/api/tags/${this.$route.params.slug}`)
                .then(
                    res => {
                        if (JSON.stringify(res.data) == '{}') {
                            this.$router.push({ name: 'not-found' })
                        } else {
                        this.tag = res.data;
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

<style>

</style>