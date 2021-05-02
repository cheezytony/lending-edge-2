<template>
  <section class="row mx-0">
    <div class="col-12 col-md-7 col-lg-7 col-xl-8 mx-auto">
      <div class="mb-5">
        <h1 class="mb-2">Get Started.</h1>
        <p>
          Create your account to get started with lending Edge.
        </p>
        <p class="text-danger">
          Fields with * are required.
        </p>
      </div>

      <form
        ref="form"
        novalidate
        @submit.prevent="submit"
      >
        <div class="row">
          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.first_name.value"
              name="first_name"
              id="first_name"
              :form="form"
              label="First Name *"
              placeholder="e.g. Steve"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.middle_name.value"
              name="middle_name"
              id="middle_name"
              :form="form"
              label="Middle Name"
              placeholder="e.g. Steve"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.last_name.value"
              name="last_name"
              id="last_name"
              :form="form"
              label="Last Name *"
              placeholder="e.g. Sam"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.date_of_birth.value"
              type="date"
              name="date_of_birth"
              id="date_of_birth"
              :form="form"
              label="Date Of Birth *"
              placeholder="e.g. 14/05/1981"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.phone.value"
              type="phone"
              name="phone"
              id="phone"
              :form="form"
              label="Phone Number *"
              placeholder="e.g. 08012345678"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.nationality.value"
              name="nationality"
              id="nationality"
              :form="form"
              label="Nationality *"
              placeholder="e.g. Nigeria"
            />
          </div>

          <div class="col-12">
            <FormGroup
              v-model="form.data.home_address.value"
              type="textarea"
              name="home_address"
              id="home_address"
              :form="form"
              label="Home Address *"
              placeholder="e.g. 15, Some StreetName, Some Area"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.occupation.value"
              name="occupation"
              id="occupation"
              :form="form"
              label="Occupation *"
              placeholder="e.g. Super Hero"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.salary.value"
              type="money"
              name="salary"
              id="salary"
              :form="form"
              label="Salary *"
              placeholder="e.g. 250,000.00"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.email.value"
              type="email"
              name="email"
              id="email"
              :form="form"
              label="Email Address *"
              placeholder="e.g. example@email.com"
            />
          </div>

          <div class="col-12 col-md-6">
            <FormGroup
              v-model="form.data.password.value"
              type="password"
              name="password"
              id="password"
              :form="form"
              label="Password *"
              placeholder="e.g. myPassword-153"
              :display-all-errors="true"
            />
          </div>

          <div class="col-12 mt-4">
            <div class="mb-3">
              <InputCheckbox
                v-model="form.data.terms.value"
                name="terms"
                id="terms"
              >
                I agree to all the
                <router-link :to="{ name: 'terms' }" target="_blank">
                  Terms
                </router-link>,
                <router-link :to="{ name: 'privacy' }" target="_blank">
                  Privacy Policy
                </router-link>.
                and
                <router-link :to="{ name: 'fees' }" target="_blank">
                  Fees
                </router-link>.
              </InputCheckbox>
              <div class="invalid-feedback d-block" v-if="getFirstError('terms')">
                You need to agree to the terms of service to proceed.
              </div>
            </div>
          </div>

          <div class="col-12">
            <AlertSuccess v-if="form.success">
              <i class="bi bi-check-square" />
              <span class="ml-1">{{ form.success }}</span>
            </AlertSuccess>
            <AlertDanger v-else-if="getFormError(form)">
              <i class="bi bi-exclamation-square" />
              <span class="ml-1">{{ getFormError(form) }}</span>
            </AlertDanger>

            <div class="mb-3 mt-4">
              <ButtonSubmit :form="form">
                Create Account
              </ButtonSubmit>
            </div>

            <p class="mb-3">
              Already have an account?
              <router-link :to="{ name: 'login' }">
                Login
              </router-link>
            </p>
          </div>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      form: this.$options.basicForm([
        { name: 'first_name', rules: 'required' },
        { name: 'middle_name', rules: 'nullable' },
        { name: 'last_name', rules: 'required' },
        { name: 'date_of_birth', rules: 'required' },
        { name: 'phone', rules: 'required|phone' },
        { name: 'nationality', rules: 'required' },
        { name: 'home_address', rules: 'required' },
        { name: 'occupation', rules: 'required' },
        { name: 'salary', rules: 'required' },
        { name: 'email', rules: 'required|email' },
        { name: 'password', rules: 'required|min:8|alphaNumPunct' },
        { name: 'terms', rules: 'true', value: false },
      ]),
    };
  },
  mounted() {
    this.$options.basicWatchers(this, 'form');
  },
  methods: {
    async submit() {
      if (this.validateForm(this.form)) {
        this.form.error = false;
        this.form.success = false;

        this.form.setLoading();
        await this.sendRequest('authentication.register', {
          data: this.getFormData(),
          success: (response) => {
            const {
              data: { message, data: { user, token, expires_in: expiresIn } },
            } = response;
            this.$auth.login({ user, token, expiresIn })
              .then(() => {
                this.form.success = message;
                setTimeout(() => {
                  this.$router.push({ name: 'user.dashboard' });
                }, 2000);
              });
          },
          error: (error) => {
            this.form.error = error;
            this.mapFormErrors(this.form, error?.response?.data?.errors);
          },
        });
        this.form.setLoading(false);
      }
    },
  },
};
</script>
