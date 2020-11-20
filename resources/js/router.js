import Vue from 'vue';
import VueRouter from 'vue-router';
import master_default from './layouts/default'
import home from './pages/home'
import dashboard_layout from './layouts/dashboard_layout'
import dashboard from './pages/dashboard'


Vue.use(VueRouter);

export default new VueRouter({

    base: '/',
    routes: [
        {  path: '/', component: master_default,  children: [
                                                    { path: '/', component: home, name: 'home' },
                                                  
                                             ] },
        {  path: 'dashboard/', component: dashboard_layout,  children: [
                                                    { path: '/', component: dashboard, name: 'dashboard' },
                                                 
                                             ] },
    ]
})