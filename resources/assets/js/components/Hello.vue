<template>
  <div class="flex-center position-ref full-height">
    <div class="top-right links" v-if="routeHasLogin">
      <a :href="baseUrl + '/login'">Login</a>
      <a :href="baseUrl + '/register'">Register</a>
    </div>

    <div class="content anim-fade-down">
      <div class="title m-b-md">
        {{ title }}
      </div>

      <div class="links">
        <a href="https://laravel.com/docs">Laravel Documentation</a>
        <a href="https://vuejs.org/guide">Vue Documentation</a>
        <a href="https://laracasts.com">Laracasts</a>
        <a href="https://laravel-news.com">News</a>
        <a href="https://forge.laravel.com">Forge</a>
        <a href="https://github.com/GianlucaCandiotti/laravue">GitHub</a>
      </div>
    </div>
  </div>
</template>

<script>
  import injectorsMixin from '../mixins/injectors';

  export default {
    mixins: [injectorsMixin],
    data() {
      return {
        title: 'Laravue',
      };
    },
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Raleway', sans-serif !important;
    font-weight: 100;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 84px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
    font-family: 'Roboto';
  }

  .m-b-md {
    margin-bottom: 30px;
  }
</style>
