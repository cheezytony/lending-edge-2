import Vue from 'vue';
import lodash from 'lodash';
import axios from 'axios';
import './components';
// import './mixins';
import Form from '@cheezytony/vue-form';

Vue.use(Form);

Vue.prototype.$http = axios;
Vue.config.ignoredElements = [/^ion-/];

window._ = lodash;

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
