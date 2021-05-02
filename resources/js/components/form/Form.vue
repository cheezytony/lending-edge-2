<template>
  <form>
    <template v-for="(field, fieldIndex) in form.data">
      <div :key="fieldIndex">
        <FormGroup></FormGroup>
      </div>
    </template>
  </form>
</template>

<script>
export default {};
</script>