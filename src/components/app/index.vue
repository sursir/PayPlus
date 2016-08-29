<template>
  <div class="container">
    111
  </div>
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
        this.$http.get('app/listing').then((resp) => {
          this.$set('apps', resp.data)
        }, (resp) => {
          console.log(resp)
        })
      }
    }
  }
</script>
<style scoped>
  @import "../../assets/css/common.css";

  .container {
    background-color: #fff;
    height: auto;
  }
</style>