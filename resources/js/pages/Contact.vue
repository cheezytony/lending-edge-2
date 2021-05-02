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
              <h1 class="text-white">Connect with us</h1>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, perferendis?</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-12 col-md-12">
            <div class="mb-5">
              <h2 class="mb-2">Get in touch</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing, elit.
                Ipsam similique maiores nobis, rerum minima.
                Magnam provident sequi, suscipit, voluptatem dicta ipsam laboriosam
                ullam nisi amet quisquam. Dolor odit porro neque.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <form class="contact__form" @submit.prevent="submit" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <FormGroup
                    v-model="form.data.name.value"
                    :form="form"
                    name="name"
                    type="text"
                    label="Name"
                    placeholder="e.g. FirstName LastName"
                  />
                </div>
                <div class="col-md-6">
                  <FormGroup
                    v-model="form.data.email.value"
                    :form="form"
                    name="email"
                    type="email"
                    label="Email"
                    placeholder="e.g. example@email.com"
                  />
                </div>
                <div class="col-md-12">
                  <FormGroup
                    v-model="form.data.subject.value"
                    :form="form"
                    name="subject"
                    type="text"
                    label="Subject"
                    placeholder="e.g. I'd like to take a loan."
                  />
                </div>
                <div class="col-12">
                  <FormGroup
                    v-model="form.data.message.value"
                    :form="form"
                    name="message"
                    type="textarea"
                    rows="6"
                    label="Message"
                    placeholder="e.g. Lorem ipsum dolor sit amet."
                  />
                </div>
                <!-- form message -->
                <div class="col-12">
                  <AlertSuccess v-if="form.success">
                    <i class="bi bi-check-square" />
                    <span class="ml-1">{{ form.success }}</span>
                  </AlertSuccess>
                  <AlertDanger v-else-if="getFormError(form)">
                    <i class="bi bi-exclamation-square" />
                    <span class="ml-1">{{ getFormError(form) }}</span>
                  </AlertDanger>
                </div>
                <!-- end message -->
                <div class="col-12 mt-4">
                  <ButtonSubmit
                    :form="form"
                    class="btn btn-hero btn-circled"
                  >
                    Send Message
                  </ButtonSubmit>
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-5 pl-4 mt-4 mt-lg-0">
            <h4>Office Address</h4>
            <p class="mb-3">Suit 100 Cubhub Adebola House Opebi Ikeja Lagos.</p>
            <h4>Contact Info</h4>
            <p class="mb-3">09058175809</p>
            <h4>Contact Mail</h4>
            <p class="mb-3">lendingedge02@gmail.com</p>
            <h4>Website</h4>
            <p>www.lendingedge.com</p>
          </div>
        </div>
      </div>
    </section>
  </article>
</template>

<script>
export default {
  name: 'PageContact',
  data() {
    return {
      form: this.$options.basicForm([
        'name', 'email', 'subject', 'message',
      ], { successMessage: null }),
    };
  },
  mounted() {
    this.$options.basicWatchers(this, 'form');
  },
  methods: {
    async submit() {
      if (!this.validateForm(this.form)) {
        return;
      }

      this.form.error = false;
      this.form.success = false;

      this.form.loading = true;
      await this.$http({
        url: '/mail',
        method: 'POST',
        data: this.getFormData(),
      }).then((response) => {
        this.form = this.resetForm(this.form);

        this.form.success = response.data.message;
      }).catch((error) => {
        this.form.error = error;
      });
      this.form.loading = false;
    },
  },
};
</script>
