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
// Set API Domain
Vue.http.options.root = 'http://pay.dev'

Vue.http.interceptors.push((request, next) => {
  console.log('REQUEST START')
  next((resp) => {
    console.log('REQUEST END')
  })
})

// Object.keys(filters).forEach(k => Vue.filter(k, filters[k]));
var App = Vue.extend({})
var router = new VueRouter({
  saveScrollPosition: true,
  suppressTransitionError: true
})

RouterMap(router)

router.beforeEach(function ({ to, next }) {
  if (to.path !== '/auth/signin' || to.path !== '/') {
    if (window.localStorage.getItem('Token')) {
      Vue.http.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('Token')
    } else {
      router.go('/auth/signin')
    }
  }
  next()
})

router.afterEach(function ({ to }) {
  console.log('成功浏览到: ' + to.path)
})
router.start(App, 'body')
