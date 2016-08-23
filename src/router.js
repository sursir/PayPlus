import app from './components/app.vue'
import none from './components/none.vue'
import signin from './components/auth/signin.vue'
import apps from './components/app/index.vue'

export default function (router) {
  router.map({
    '/': {
      name: 'app',
      component: app
    },
    '/404': {
      name: 'none',
      component: none
    },
    '/auth/signin': {
      name: 'signin',
      component: signin
    },
    '/app': {
      name: 'apps',
      component: apps
    }
  })
  router.redirect({
    '*': '/404'
  })
}
