
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// require('./bin/materialize.min.js');
require('./bin/materialize.min');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
// Vue.component('example', require('./components/Lecture.vue'));
Vue.component('schedule', require('./components/Schedule.vue'));


const app = new Vue({
    el: '#app'/*, 
		data() {
			return { activeItem: '' }
		},
		methods: {
			isActive: function (menuItem) {
				//return console.log(menuItem)
				return this.activeItem === menuItem
			},
			setActive: function (menuItem) {
				// console.log(menuItem)
				this.activeItem = menuItem
			}
		} */
});

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
});
