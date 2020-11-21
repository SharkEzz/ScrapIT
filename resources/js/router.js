import VueRouter from "vue-router";
import Home from "./Vue/Components/Pages/Home";
import Products from "./Vue/Components/Pages/Products";
import Scrapers from "./Vue/Components/Pages/Scrapers";

const routes = [
    {
        path: '/',
        name: 'index',
        component: Home
    },
    {
        path: '/products',
        name: 'products',
        component: Products
    },
    {
        path: '/scrapers',
        name: 'scrapers',
        component: Scrapers
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;