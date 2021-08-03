<template>
    <section v-if="category" class="my-5">
        <h1>Post appartenenti alla categoria: <span class="badge badge-primary">{{ category.name }}</span></h1>

        <ul v-if="category.posts.length > 0">
            <li v-for="post in category.posts" :key="`post-${post.id}`">
                <router-link :to="{ name: 'single-post', params: { slug: post.slug}}">{{ post.title }}</router-link>
            </li>
        </ul>
        <h3 v-else class="text-danger">Nessuno</h3>

        <router-link :to="{ name: 'categories' }" class="btn btn-primary">Elenco categorie</router-link>
    </section>
    <Loader v-else />
</template>

<script>
import Loader from '../components/Loader.vue'

export default {
    name: "Category",
    components: {
        Loader
    },
    data: function() {
        return {
            category: null
        }
    },
    created: function() {
        this.getCategory();
    },
    methods: {
        getCategory: function() {
            axios
                .get(`http://127.0.0.1:8000/api/categories/${this.$route.params.slug}`)
                .then(
                    res => {
                        if (JSON.stringify(res.data) == '{}') {
                            this.$router.push({ name: 'not-found' })
                        } else {
                        this.category = res.data;
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

<style lang="scss" scoped>
    ul {
        margin-left: 20px;
    }
</style>