import VueRouter from "vue-router";
import Home from "./Vue/Components/Pages/Home";
import Products from "./Vue/Components/Pages/Products";
import Scrapers from "./Vue/Components/Pages/Scrapers";
import Configuration from "./Vue/Components/Pages/Configuration";

const routes = [
    {
        path: '/',
        name: 'index',
        component: Home,
        meta: {
            title: 'Accueil'
        }
    },
    {
        path: '/products',
        name: 'products',
        component: Products,
        meta: {
            title: 'Produits'
        }
    },
    {
        path: '/scrapers',
        name: 'scrapers',
        component: Scrapers,
        meta: {
            title: 'Scrapers'
        }
    },
    {
        path: '/config',
        name: 'configuration',
        component: Configuration,
        meta: {
            title: 'Configuration'
        }
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    document.title = 'ScrapIT - ' + to.meta.title;

    next();
});

export default router;
