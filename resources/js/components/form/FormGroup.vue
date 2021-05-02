<template>
  <div class="form-group">
    <slot name="label">
      <InputLabel v-if="label" :for="id">
        {{ label }}
      </InputLabel>
    </slot>
    <slot>
      <component
        v-bind="$attrs"
        :value="value"
        :is="component"
        :id="id"
        :name="name"
        :class="{ 'is-invalid': firstError }"
        :is-invalid="!!firstError"
        v-on="listeners"
      />
    </slot>
    <div class="invalid-feedback d-block" v-if="errors.length">
      <template v-if="displayAllErrors">
        <ul>
          <template v-for="(error, errorIndex) in errors">
            <li :key="errorIndex" style="list-style: disc;">{{ error.message }}</li>
          </template>
        </ul>
      </template>
      <template v-else>
        {{ firstError.message }}
      </template>
    </div>
  </div>
</template>

<script>
export default {
  model: {
    event: 'change',
    prop: 'value',
  },
  props: {
    displayAllErrors: {
      type: Boolean,
      default: false,
    },
    form: {
      type: Object,
      required: true,
    },
    id: {
      type: String,
      default: '',
    },
    label: {
      type: String,
      default: '',
    },
    name: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      default: 'text',
    },
    value: {
      type: [Number, String, Boolean],
      default: '',
    },
  },
  computed: {
    component() {
      switch (this.type) {
        case 'bank':
        case 'banks':
          return 'InputBanks';
        case 'checkbox':
          return 'InputCheckbox';
        case 'date':
          return 'InputDate';
        case 'email':
          return 'InputEmail';
        case 'money':
          return 'InputMoney';
        case 'number':
          return 'InputNumber';
        case 'password':
          return 'InputPassword';
        case 'split':
          return 'InputSplit';
        case 'textarea':
          return 'InputTextarea';
        default:
          return 'Input';
      }
    },
    errors() {
      if (!this.field?.errors) {
        return [];
      }

      return Object.keys(this.field.errors)
        .map((key) => ({
          message: this.field.errors[key],
          key,
        }));
    },
    field() {
      return this.form?.data?.[this.name];
    },
    firstError() {
      const firstError = this.errors[0];
      if (firstError?.key === 'same' && this.type === 'password') {
        return { ...firstError, message: 'The passwords should be the same.' };
      }
      return firstError;
    },
    listeners() {
      const vm = this;
      return {
        change(value) {
          vm.$emit('change', value);
        },
      };
    },
  },
};
</script>
