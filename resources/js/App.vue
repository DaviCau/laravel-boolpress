<template>
    <div class="container">
        <Header />

        <main>
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
// import axios from 'axios';
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';

export default {
    name: 'App',
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss">
    @import '../sass/front.scss';
</style>