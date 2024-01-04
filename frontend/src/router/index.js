//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import( /* webpackChunkName: "home" */ '../views/home.vue')
    },
    {
        path: '/books',
        name: 'books.index',
        component: () => import( /* webpackChunkName: "index" */ '../views/books/index.vue')
    },
    {
        path: '/create',
        name: 'books.create',
        component: () => import( /* webpackChunkName: "create" */ '../views/books/create.vue')
    },
    {
        path: '/edit/:id',
        name: 'books.edit',
        component: () => import( /* webpackChunkName: "edit" */ '../views/books/edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes // <-- routes,
})

export default router
