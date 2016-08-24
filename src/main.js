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
Vue.http.options.root = (process.env.NODE_ENV === 'production')
  ? 'https://pay.api.cxsir.com'
  : 'http://pay.dev/'

// Object.keys(filters).forEach(k => Vue.filter(k, filters[k]));
let App = Vue.extend({})
let router = new VueRouter({
  saveScrollPosition: true,
  suppressTransitionError: true
})

RouterMap(router)

// 如果本地已经存储了 Token 那么尝试刷新 如果刷新失败 打印出错误信息并让用户重新登陆
Vue.http.interceptors.push((request, next) => {
  next((resp) => {
    let token = window.localStorage.getItem('Token')
    if (token && resp.status === 401) {
      Vue.http.put('auth/refresh').then((resp) => {
        if (resp.status === 200) {
          window.localStorage.setItem('Token', resp.data.resp.token)
        }
      }, (resp) => {
        window.localStorage.removeItem('Token')
        console.log(resp.data.msg)
        router.go('/auth/signin')
      })
    }
    return resp
  })
})

// 如果有 Token 了那么在 Header 里面跟上 Token
router.beforeEach(function ({ to, next }) {
  if (to.path !== '/auth/signin' && to.path !== '/' && to.path !== '/404') { //
    let token = window.localStorage.getItem('Token')
    if (token) {
      Vue.http.headers.common['Authorization'] = 'Bearer ' + token
    } else {
      router.go('/auth/signin')
    }
  }
  next()
})

router.afterEach(function ({ to }) {
  console.log('跳转到: ' + to.path)
})
router.start(App, 'body')
