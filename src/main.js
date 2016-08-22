import Vue from 'vue'
import VueRouter from 'vue-router'
import RouterMap from './router'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
// import filter from './filter'

Vue.use(VueRouter)
Vue.use(VueResource)
Vue.use(VueValidator)

Vue.http.options.emulateJSON = true
Vue.http.options.emulateHTTP = true

// Object.keys(filters).forEach(k => Vue.filter(k, filters[k]));
var App = Vue.extend({})
var router = new VueRouter({
  hashbang: true,
  history: true,
  saveScrollPosition: true,
  suppressTransitionError: true
})

RouterMap(router)
router.start(App, 'body')
