<template>
  <section class="row">
    <div class="col-12 col-md-7 col-lg-7 col-xl-6 mx-auto">
      <div class="mb-5">
        <h1 class="mb-2">Hi, Welcome Back.</h1>
        <p>
          Login to your account to resume your progress.
        </p>
      </div>

      <form
        ref="form"
        novalidate
        @submit.prevent="submit"
      >
        <div class="row">
          <div class="col-12">
            <FormGroup
              v-model="form.data.email.value"
              type="email"
              name="email"
              id="email"
              :form="form"
              label="Email Address"
              placeholder="e.g. example@email.com"
            />
          </div>

          <div class="col-12">
            <FormGroup
              v-model="form.data.password.value"
              type="password"
              name="password"
              id="password"
              :form="form"
              label="Password"
              placeholder="e.g. myPassword-153"
            />
          </div>

          <div class="col-6">
            <FormGroup
              :form="form"
              name="remember"
              id="remember"
            >
              <InputCheckbox name="remember" id="remember">
                Remember Me?
              </InputCheckbox>
            </FormGroup>
          </div>

          <div class="col-6 text-right">
            <router-link
              :to="{ name: 'password.forgot' }"
              class="fs-small"
            >
              Reset Password?
            </router-link>
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
                Login
              </ButtonSubmit>
            </div>

            <p class="mb-3">
              Not registered yet?
              <router-link :to="{ name: 'register' }">
                Create your account
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
        { name: 'email', rules: 'required|email' },
        { name: 'password', rules: 'required' },
        { name: 'remember', rules: 'nullable' },
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
        await this.sendRequest('authentication.login', {
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
          },
        });
        this.form.setLoading(false);
      }
    },
  },
};
</script>
