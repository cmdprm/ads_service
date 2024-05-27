import { createRouter, createWebHistory } from 'vue-router'
import AdList from '../views/AdList.vue';
import AdDetail from '../views/AdDetail.vue';
import AdCreate from '../views/AdCreate.vue';

const routes = [
    {
        path: '/',
        name: 'AdList',
        component: AdList
    },
    {
        path: '/ads/:id',
        name: 'AdDetail',
        component: AdDetail
    },
    {
        path: '/create',
        name: 'AdCreate',
        component: AdCreate
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
