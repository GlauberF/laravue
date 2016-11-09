
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import Hello from 'components/Hello';
import './bootstrap';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the element with the "hello" identifier in the page.
 */

/* eslint-disable no-new */
new Vue({
  el: '#hello',
  render: h => h(Hello),
});
