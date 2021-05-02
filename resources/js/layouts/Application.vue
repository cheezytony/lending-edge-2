<template>
  <div id="application">

    <LeftSidebar />

    <div id="application-content">
      <Navbar />

      <main id="main">
        <router-view />
      </main>

      <Footer />
    </div>
  </div>
</template>

<script>
import Footer from '../components/application-sections/Footer.vue';
import LeftSidebar from '../components/application-sections/LeftSidebar.vue';
import Navbar from '../components/application-sections/Navbar.vue';

export default {
  components: {
    Footer, LeftSidebar, Navbar,
  },
};
</script>
