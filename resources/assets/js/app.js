window._ = require('lodash');
window.Vue   = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Students from './components/Students.vue';

Vue.component('students', Students);

window.eventBus = new Vue();

window.app = new Vue({
	el: '#app',
});

