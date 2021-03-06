import VueRouter from "vue-router";
import Home from "./Vue/Components/Pages/Home";
import Products from "./Vue/Components/Pages/Products";
import Scrapers from "./Vue/Components/Pages/Scrapers";
import Configuration from "./Vue/Components/Pages/Configuration";
import Alerts from "./Vue/Components/Pages/Alerts";
import Login from "./Vue/Components/Pages/Login";

import { store } from "./store";
import login from "./Services/Security/loginGuard";

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
    },
    {
        path: '/alerts',
        name: 'alerts',
        component: Alerts,
        meta: {
            title: 'Alertes'
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            title: 'Connexion'
        }
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if(!store.state.loggedIn && to.name !== 'login')
    {
        document.title = process.env.MIX_APP_NAME + ' - ' + 'Connexion';
        next({name: 'login'});
    }
    else
    {
        document.title = process.env.MIX_APP_NAME + ' - ' + to.meta.title;
        next();
    }
});

export default router;
