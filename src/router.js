import app from './components/app.vue'
import none from './components/none.vue'
import signin from './components/signin.vue'
import profile from './components/profile.vue'

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
    '/user/profile': {
      name: 'profile',
      component: profile
    }
  })
  router.redirect({
    '*': '/404'
  })
}
