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
      this.getProfile()
    },
    methods: {
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