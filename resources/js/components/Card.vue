<template>
    <div class="col-4 my-3 d-flex">
        <div class="card w-100">
            <img class="card-img-top" :src="item.cover" :alt="item.title">
            <div class="card-body">
                <h4 class="card-title">{{ item.title }}</h4>
                <p>{{ item.excerpt }}</p>
                <!-- <a href="#" class="card-link">Leggi</a> -->
                <router-link class="card-link" :to="{ name: 'single-post', params: { slug: item.slug }}">Leggi</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        'item' : Object
    }
}
</script>

<style lang="scss">

</style>