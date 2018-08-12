
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./manage'); // Javascript file for the admin area


window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import Vue from 'vue';
import Buefy from 'buefy';

Vue.use(Buefy);
Vue.component('slugWidget', require('./components/slugWidget.vue'));
Vue.component('upload', require('./components/upload.vue'));
Vue.component('drag-drop', require('./components/drag-drop.vue'));
Vue.component('multi-drag-drop', require('./components/multi-drag-drop.vue'));





// var app = new Vue({
//       el: '#app',
//       data: {
//         permissionType: 'basic',
//         resource: '',
//         crudSelected: ['create', 'read', 'update', 'delete'],
//         auto_password: true,
//         password_options: "keep",
//       },
//       methods: {
//         crudName: function(item) {
//           return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
//         },
//         crudSlug: function(item) {
//           return item.toLowerCase() + "-" + app.resource.toLowerCase();
//         },
//         crudDescription: function(item) {
//           return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
//         }
//       }
//     });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */







// Bulma NavBar Burger Script
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {

                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});

// $(document).ready(function(){
//      $('navbar-dropdown').hover(function(e){
//         $(this).toggleClass('is-open');
//      })
// })



require('./bulma-extensions');
