<template>
  <div>
    <Navbar />

    <transition name="fade" mode="out-in">
      <router-view />
    </transition>

    <Footer />
  </div>
</template>

<script>
import Footer from '../components/landing-page-sections/Footer.vue';
import Navbar from '../components/landing-page-sections/Navbar.vue';

export default {
  components: {
    Footer,
    Navbar,
  },
};
</script>
