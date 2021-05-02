<template>
  <nav class="navbar navbar-expand-lg fixed-top trans-navigation">
    <div class="container">
      <router-link class="navbar-brand" :to="{ name: 'home' }">
        <img src="images/logo/default.png" alt="" class="img-fluid b-logo" height="40">
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#mainNav"
        aria-controls="mainNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon">
          <i class="fa fa-bars"></i>
        </span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="mainNav">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <router-link
              :to="{ name: 'home' }"
              class="nav-link"
            >
              Home
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              :to="{ name: 'about' }"
              class="nav-link smoth-scroll"
            >
              About
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              :to="{ name: 'contact' }"
              class="nav-link smoth-scroll"
            >
              Contact Us
            </router-link>
          </li>
        </ul>

        <a
          href="#!"
          class="btn btn-white btn-circled ml-4 ml-lg-5 mt-4 mt-lg-0"
        >
          Download App
        </a>
      </div>
    </div>
  </nav>
</template>
