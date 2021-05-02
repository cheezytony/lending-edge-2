<template>
  <button
    v-bind="listeners"
    type="submit"
    class="btn btn-hero btn-block"
    :disabled="isLoading"
  >
    <LoaderSmWhite v-if="isLoading" />
    <slot v-else />
  </button>
</template>

<script>
export default {
  props: {
    form: {
      type: Object,
      required: true,
    },
    loading: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    isLoading() {
      return this.form?.loading || this.loading;
    },
    listeners() {
      const vm = this;
      return {
        click: (event) => {
          vm.$emit('click', event);
        },
      };
    },
  },
};
</script>
