<template>
  <div class="loader-sm">
    <div class="loader-sm-dot" />
    <div class="loader-sm-dot" />
    <div class="loader-sm-dot" />
  </div>
</template>

<style lang="sass" scoped>
@keyframes zoom-animation
  0%
    transform: scale(1)
  50%
    transform: scale(.3)
  100%
    transform: scale(1)

.loader-sm
  align-items: center
  display: inline-flex
  flex-direction: row
  &-dot
    animation: zoom-animation 1s infinite
    background: #007bff
    border-radius: 50%
    height: 10px
    margin-right: .35rem
    width: 10px
    &:nth-child(2)
      animation-delay: .15s
    &:nth-child(3)
      animation-delay: .3s
  &-white
    .loader-sm-dot
      background: #fff
</style>
