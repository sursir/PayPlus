<template>
  <h1>1</h1>
</template>

<script>
  export default {
    data () {
      return {
        profile: ''
      }
    },
    ready () {
      this.init()
      this.getProfile()
    },
    methods: {
      init () {
        document.title = '应用列表'
      },
      getProfile () {
        this.$http.get('user/profile').then((resp) => {
          console.log(resp)
        }, (resp) => {
          console.log(resp)
        })
      }
    }
  }
</script>