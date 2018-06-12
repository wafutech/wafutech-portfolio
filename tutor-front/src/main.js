// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VeeValidate from 'vee-validate'
import wysiwyg from "vue-wysiwyg"
import bash from 'bash';
//import 'vue-wysiwyg/dist/vueWysiwg.js'
//import 'vue-wysiwyg/dist/vueWysiwg.css'

Vue.use(wysiwyg,{image:{uploadURL:"http://127.0.0.1:8000/api/blog/post/images"},maxHeight:"500px"})
Vue.use(VueAxios, axios);
Vue.use(VeeValidate);
axios.defaults.baseURL = 'http://127.0.0.1:8000/api/'


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
