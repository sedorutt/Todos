import Vue from 'vue';
import VueRouter from 'vue-router';
import TodoListComponent from './components/TodoListComponent.vue';


require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(VueRouter);                         //* これを忘れない！！


Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Todo',
            component: TodoListComponent
        },
    ]
})

const app = new Vue({
    el: '#app',
    router:router
});

