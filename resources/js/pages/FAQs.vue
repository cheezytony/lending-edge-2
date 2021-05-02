<template>
  <article>
    <div class="page-banner-area page-contact" id="page-banner">
      <div class="overlay dark-overlay"></div>
      <div class="overlay dark-overlay banner-container"></div>
      <div class="overlay dark-overlay banner-container"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
            <div class="banner-content content-padding">
              <h1 class="text-white">Fequestly Asked Questions</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="section-padding">
      <div class="container">
        <div class="list-group">
          <template v-for="(faq, index) in faqs">
            <div :key="index" class="list-group-item" :id="toSlug(faq.question)">
              <a
                :href="`#${toSlug(faq.question)}`"
                class="mb-3"
                style="display: block; font-weight: bold; text-transform: uppercase;"
              >
                {{ faq.question }}
              </a>
              <div v-html="faq.answer" class="mb-3" />
            </div>
          </template>
        </div>
      </div>
    </section>
  </article>
</template>

<script>
export default {
  name: 'FAQs',
  data() {
    return {
      faqs: [
        {
          question: 'HOW DO I GET LENDING EDGE LOAN?',
          answer:
            `If are go through the website, tap on “apply now” and follow the link,
            it will take you straight to the app on google playstore.
            Download the app and apply with your name and BVN connected phone number.
            You can contact us for more support on 09058175809.
          `,
        },
        {
          question: 'HOW DO I QUALIFY FOR LENDING EDGE LOAN?',
          answer: `The best way to know if you are qualified for our loan is just to apply and you will confirm in just few minutes that’s all. Apply now.
          `,
        },
        {
          question: 'HOW LONG DOES IT TAKE TO GET LENDING EDGE LOAN?',
          answer: `We ensure that you get your loan straight to your Bank Account in few minutes, and if this is not so please contact us immediately on 09058175809.
          `,
        },
        {
          question: 'DO I NEED TO PROVIDE COLLATERAL OR DOCUMENT TO REQUEST FOR LENDING EDGE LOAN?',
          answer: `No you don’t need collateral or document to request for our loan.
          `,
        },
        {
          question: 'DO I NEED TO VISIT A BANK TO GET LENDING EDGE LOAN?',
          answer: `No. You can conveniently borrow Lending Edge loan via your phone, all you need is a bank Account connected to your BVN.
          `,
        },
        {
          question: 'WHERE ELSE CAN I GET LENDING EDGE LOAN?',
          answer: `You can only get Lending Edge loan directly from your phone. Just tap on “apply now” and follow the link to download Lending Edge app.
          `,
        },
        {
          question: 'DO YOU HAVE A MOBILE APP?',
          answer: `Yes we do. Just tap on “Apply now” and follow the link to download Lending Edge app.
          `,
        },
        {
          question: 'CAN I ACCESS LENDING EDGE LOANS IF I PORT MY NUMBER TO ANOTHER NETWORK OR CHANGE MY PHONE?',
          answer: `Yes, as long as your sim registration match your Bank Account details and you remember your login details in the case of change of phone, which means you need to download Lending Edge app again on the new phone. You can always call us for assistance.
          `,
        },
        {
          question: 'CAN I USE USSD CODE TO REQUEST FOR LENDING EDGE LOAN?',
          answer: `We are still working on this function, so for now no ussd for Lending Edge loans.
          `,
        },
        {
          question: 'CAN I ACCESS LENDING EDGE WITH ANOTHER PERSON’S PHONE NUMBER OR PHONE?',
          answer: `No. Every loan is specific to an individual, and trying to access loan with another person’s phone number or phone is fraud.
          `,
        },
        {
          question: 'HOW DO I PAY BACK MY LOAN?',
          answer: `You pay back your loan via your Lending Edge app automatically through the repay button which obviously means you have added your card details to the Lending Edge app on your phone or pay via bank Transfer, cash deposit, or POS to the Lending Edge Bank Account displayed on the Lending Edge app.</br>
          <strong>*NOTE*</strong></br/>
          Do not pay back your loan to any other Bank account that is not Lending Edge official account number or to any agent. Please pay via your Lending Edge app or the Lending Edge Account number displayed on the Lending Edge app.`,
        },
      ],
    };
  },
  mounted() {
    this.handleNavigation();
  },
  methods: {
    handleNavigation() {
      const { hash } = this.$route;
      if (!hash) {
        return;
      }

      const $ = window.jQuery;

      const element = $(hash);
      if (!element) {
        return;
      }

      $('body, html').animate({
        scrollTop: $(element).offset().top,
      });
    },
    toSlug(string) {
      return string?.replace(/\s/g, '_').replace('?', '').toLowerCase();
    },
  },
};
</script>
