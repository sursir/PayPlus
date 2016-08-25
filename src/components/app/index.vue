<template>
  <h1>Apps</h1>
  <ul>
    <li>{{ apps.id }}</li>
    <li>{{ apps.email }}</li>
  </ul>
</template>

<script>
  export default {
    data () {
      return {
        apps: ''
      }
    },
    ready () {
      this.init()
      this.getApps()
    },
    methods: {
      init () {
        document.title = '应用列表'
      },
      getApps () {
        this.$http.get('user/profile').then((resp) => {
          this.$set('apps', resp.data)
        }, (resp) => {
          console.log(resp)
        })
      }
    }
  }
</script>