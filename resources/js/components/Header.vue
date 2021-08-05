<template>
    <header>
        <nav>
            <ul>
                <li>
                    <!-- <a href="/">Home</a> -->
                    <router-link :to="{ name: 'home'}">Home</router-link>
                </li>
                <li>
                    <!-- <a href="/blog">Blog</a> -->
                    <router-link :to="{ name: 'blog'}">Blog</router-link>
                </li>
                <li>
                    <!-- <a href="/about">Chi Siamo</a> -->
                    <router-link :to="{ name: 'about'}">Chi Siamo</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'contact-us'}">Contattaci</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>
    header {
        text-align: center;
        margin-top: 30px;

        li {
            display: inline-block;

            a {
                display: inline-block;
                padding: 5px 10px;
                text-decoration: none;

                &.active,
                &:hover {
                    background-color: lightblue;
                }
            }
        }
    }
</style>