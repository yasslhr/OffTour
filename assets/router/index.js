
import Galeries from '../components/Galeries.vue'
import {createRouter, createWebHashHistory} from "vue-router";

const routes = [
    {
        path: '/',
        name : 'homepage',
        component : Galeries
    },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
