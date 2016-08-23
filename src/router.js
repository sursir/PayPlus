import app from './components/app.vue'
import none from './components/none.vue'
import signin from './components/signin.vue'
import apps from './components/apps.vue'

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
    '/apps': {
      name: 'apps',
      component: apps
    }
  })
  router.redirect({
    '*': '/404'
  })
}
