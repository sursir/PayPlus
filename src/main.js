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
  let token = window.localStorage.getItem('Token')
  // 发送请求之前如果本地存在 Token 那么先把 Token 放到 Header
  if (token) {
    Vue.http.headers.common['Authorization'] = 'Bearer ' + token
  }

  next((resp) => {
    if (resp.status === 401) {
      // 如果本地没有 Token 那么直接跳转到登陆界面
      if (!token) {
        router.go('/auth/signin')
      }
      // 尝试刷新 如果刷新失败 那么跳转到登陆界面
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

router.beforeEach(function ({ to, next }) {
  console.log('准备访问到: ' + to.path)
  next()
})

router.afterEach(function ({ to }) {
  console.log('成功访问到: ' + to.path)
})
router.start(App, 'body')
