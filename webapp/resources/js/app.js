/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('task-list', require('./components/TaskList.vue').default);
Vue.use(require('vue-moment'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        headers: [],
        rows: []
    },
    mounted() {
        axios
            .get('sample.csv')
            .then(response => {
                const text = response.data
                const re = /\r\n|\n\r|\n|\r/g
                const lines = text.replace(re, '\n').split('\n')
                for (let i = 0; i < lines.length; i++) {
                    // IGNORE IF EMPTY LINE
                    if (!lines[i].trim().length) continue
                    const ss = lines[i].split(',')
                    // IGNORE IF EMPTY COLLUMNS
                    if (!ss.length) continue
                    // SAVE THE LINE AS HEADER OR NORMAL ROW
                    if (i == 0) {
                        for (let j = 0; j < ss.length; j++) {
                            this.headers.push(ss[j].trim())
                        }
                    } else {
                        const row = []
                        for (let j = 0; j < ss.length; j++) {
                            row.push(ss[j].trim())
                        }
                        this.rows.push(row)
                    }
                }
            })
    }
});
