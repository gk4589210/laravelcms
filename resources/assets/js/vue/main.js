import Vue from './../../../../node_modules/vue/dist/vue.min.js'
import Vuex from './../../../../node_modules/vuex/dist/vuex.min.js'
import Lib from './lib.js'
import App from './app.vue'
import VueRouter from './../../../../node_modules/vue-router/dist/vue-router.min.js'
import VueResource from './../../../../node_modules/vue-resource/dist/vue-resource.min.js'
Vue.use(VueRouter)
Vue.use(VueResource)
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=csrf-token]').getAttribute('content')
Vue.http.options.emulateJSON = true;

const homeHome = resolve => {require(['./module/home/home.vue'], resolve)}
const adminHome = resolve => {require(['./module/admin/home.vue'], resolve)}
//路由
const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { 
      path: '/',
      name: 'root',
      component: homeHome
    },
    { 
      path: '/admin',
      name: 'admin',
      component: adminHome
    }
  ]
})
new Vue(Vue.util.extend({ router }, App)).$mount('#appContent')