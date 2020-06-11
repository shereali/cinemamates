
require('./bootstrap');

window.Vue = require('vue');
import master from '../components/frontend/layouts/Master'
import vuetify from './index'
import router from './routes'
import store from './store'

// Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Moment
import moment from 'moment';

// Select Element
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
Vue.component('v-select', vSelect)

// DateTime Picker
import { Datetime } from 'vue-datetime';

Vue.component('datetime', Datetime);
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'

// SweetAlert2
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

Vue.component('navbar', require('../components/frontend/layouts/Navbar').default)


const app = new Vue({
    vuetify,
    router,
    moment,
    store,
    created() {
        const userInfo = localStorage.getItem("user");
        if (userInfo) {
            const userData = JSON.parse(userInfo);
            this.$store.commit("setUserData", userData);
        }
        axios.interceptors.response.use(
            response => response,
            error => {
                if (error.response.status === 401) {
                    this.$store.dispatch('singOut')
                }
                return Promise.reject(error)
            }
        )
    },
    render: h => h(master)
}).$mount('#app');
