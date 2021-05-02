<template>
  <input
    v-bind="$attrs"
    v-on="listeners"
    :value="value"
    class="form-control"
  />
</template>

<script>
export default {
  model: {
    event: 'change',
    prop: 'value',
  },
  props: {
    value: {
      type: String,
      default: '',
    },
  },
  computed: {
    listeners() {
      const vm = this;

      return {
        ...this.$listeners,
        change: (event) => {
          vm.$emit('change', event.target.value);
        },
        input: (event) => {
          vm.$emit('input', event.target.value);
          vm.$emit('change', event.target.value);
        },
      };
    },
  },
};
</script>
