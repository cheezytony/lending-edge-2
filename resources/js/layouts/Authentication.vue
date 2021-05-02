<template>
  <section class="pt-4" style="padding-bottom: 90px;">
    <div class="container">
      <div class="mb-5 pb-5">
        <router-link :to="{ name: 'home' }">
          <img
            src="/images/logo/default.png"
            alt="Lending Edge"
            height="40"
          />
        </router-link>
      </div>

      <router-view />
    </div>
  </section>
</template>
