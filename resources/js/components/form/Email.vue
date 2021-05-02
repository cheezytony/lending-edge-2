<template>
  <Input
    type="email"
    name="email"
    :value="value"
    @change="change"
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
  methods: {
    change(value) {
      this.$emit('change', value);
    },
  },
};
</script>
