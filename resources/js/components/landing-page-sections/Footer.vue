<template>
  <section id="footer" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-sm-8 col-md-8">
          <div class="footer-widget footer-link">
            <h4>We concern about you<br> to grow business rapidly.</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Dolore ipsam hic non sunt recusandae atque unde saepe nihil
              earum voluptatibus aliquid optio suscipit nobis quia excepturi vel quod, iure quae.
            </p>
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-md-4">
          <div class="footer-widget footer-link">
            <h4>About</h4>
            <ul>
              <li>
                <router-link :to="{ name: 'about' }">
                  About Us
                </router-link>
              </li>
              <li>
                <router-link :to="{ name: 'contact' }">
                  Contact Us
                </router-link>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-sm-6 col-md-6">
          <div class="footer-widget footer-link">
            <h4>Quick Links</h4>
            <ul>
              <li>
                <router-link
                  :to="{ name: 'faqs', hash: '#how_do_i_get_lending_edge_loan' }"
                >
                  How it Works
                </router-link>
              </li>
              <li>
                <router-link :to="{ name: 'faqs' }">FAQs</router-link>
              </li>
              <li>
                <a href="#">Privacy Policy</a>
              </li>
              <li>
                <a href="#">Report Bug</a>
              </li>
              <li>
                <a href="#">License</a>
              </li>
              <li>
                <a href="#">Terms & Condition</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6">
          <div class="footer-widget footer-text">
            <h4>Our location</h4>
            <p>
              <span>Mail:</span>
              <a href="mailto:lendingedge02@gmail.com">lendingedge02@gmail.com</a>
            </p>
            <p>
              <span>Phone:</span>
              <a href="tel:09058175809">09058175809</a>
            </p>
            <p>
              <span>Location:</span> Suit 100 Cubhub Adebola House Opebi Ikeja Lagos.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="footer-copy">
            © {{ currentYear }} Lending Edge inc. All Rights Reserved.
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  computed: {
    currentYear() {
      return (new Date()).getFullYear();
    },
  },
};
</script>
