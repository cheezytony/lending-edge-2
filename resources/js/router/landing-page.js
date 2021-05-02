import LandingPage from '../layouts/LandingPage.vue';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Contact from '../pages/Contact.vue';
import FAQs from '../pages/FAQs.vue';

export default [
  {
    path: '/',
    component: LandingPage,
    children: [
      {
        name: 'home',
        path: '/',
        component: Home,
      },
      {
        name: 'about',
        path: '/about',
        component: About,
      },
      {
        name: 'contact',
        path: '/contact',
        component: Contact,
      },
      {
        name: 'faqs',
        path: '/faqs',
        component: FAQs,
      },
    ],
  },
];
