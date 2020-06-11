import Vue from 'vue'
import Router from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueResource from 'vue-resource'

import routesFrontend from './routes_frontend'
import routesBackend from './routes_backend'

axios.defaults.withCredentials = true
axios.defaults.baseURL = window.location.origin

Vue.use(Router, VueAxios, axios, VueResource)

let router = new Router({
    mode: 'history',
    base: '/',
    fallback: true,
    routes: [...routesFrontend, ...routesBackend]
})

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')

    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
        next('/signin')
        return
    }
    next()
})

export default router