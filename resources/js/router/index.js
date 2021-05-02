import Vue from 'vue';
import VueRouter from 'vue-router';
import middlewares from './middlewares';

// import authentication from './authentication';
// import userDashboard from './user-dashboard';
import landingPages from './landing-page';

Vue.use(VueRouter);

const routes = [
  ...landingPages,
  // ...authentication,
  // ...userDashboard,
];

const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    }

    return { x: 0, y: 0 };
  },
});

middlewares.init(router);

export default router;
