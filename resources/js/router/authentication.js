import Authentication from '../layouts/Authentication.vue';
import Login from '../pages/Login.vue';
import Register from '../pages/Register.vue';
import ForgotPassword from '../pages/password/Forgot.vue';
import ResetPassword from '../pages/password/Reset.vue';
import Onboarding from '../pages/onboarding/Index.vue';

export default [
  {
    path: '/',
    component: Authentication,
    children: [
      {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
          middlewares: ['guest'],
        },
      },
      {
        name: 'register',
        path: '/register',
        component: Register,
        meta: {
          middlewares: ['guest'],
        },
      },
      {
        name: 'password.forgot',
        path: '/password/forgot',
        component: ForgotPassword,
        meta: {
          middlewares: ['guest'],
        },
      },
      {
        name: 'password.reset',
        path: '/password/reset/:token',
        component: ResetPassword,
        meta: {
          middlewares: ['guest'],
        },
      },
      {
        name: 'onboarding',
        path: '/onboarding',
        component: Onboarding,
        meta: {
          middlewares: ['auth'],
        },
      },
    ],
  },
];
