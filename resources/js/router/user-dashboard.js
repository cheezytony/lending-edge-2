// import Dashboard from '../pages/user/dashboard/Index.vue';
import Application from '../layouts/Application.vue';

export default [
  {
    component: Application,
    path: '/',
    children: [
      {
        // component: Dashboard,
        name: 'user.dashboard',
        path: '/app',
      },
    ],
  },
];
