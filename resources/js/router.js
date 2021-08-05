import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';
import SinglePost from './pages/SinglePost';
import NotFound from './pages/NotFound';
import Category from './pages/Category';
import Tag from './pages/Tag';
import Categories from './pages/Categories';
import Contact from './pages/Contact';

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/contact-us',
            name: 'contact-us',
            component: Contact
        },
        {
            path: '/blog/categories',
            name: 'categories',
            component: Categories
        },
        {
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePost
        },
        {
            path: '/blog/category/:slug',
            name: 'category',
            component: Category
        },
        {
            path: '/blog/tag/:slug',
            name: 'tag',
            component: Tag
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;