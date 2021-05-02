import Vue from 'vue';
import NProgress from 'vue-nprogress';
// eslint-disable-next-line import/no-unresolved
import NprogressContainer from 'vue-nprogress/src/NprogressContainer';
import router from './router/index';

Vue.use(NProgress);

require('./bootstrap');

const nprogress = new NProgress();

new Vue({
  nprogress,
  router,
  components: {
    NprogressContainer,
  },
}).$mount('#app');
