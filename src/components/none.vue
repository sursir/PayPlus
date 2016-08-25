<template>
  <h1>404 NOT FOUND</h1>
  <hr>
  <p>Powered by Vue.js</p>
</template>
<script>
  export default {
    ready () {
      this.init()
    },
    methods: {
      init () {
        document.title = '404 NOT FOUND'
      }
    }
  }
</script>
<style scoped>
  h1 {
    font-size: 3rem;
    margin-top: 50px;
    text-align: center;
  }
  p {
    font-size: 1.8rem;
    text-align: center;
  }
</style>