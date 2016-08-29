<template>
  <div class="bg"></div>
  <div class="container">
    <div class="pull-left two">
      <div class="menu">
        <h1>CONTROL</h1>
        <ul>
          <li><a href="#">11111</a></li>
          <li><a href="#">22222</a></li>
          <li><a href="#">33333</a></li>
          <li><a href="#">44444</a></li>
          <li><a href="#">55555</a></li>
        </ul>
      </div>
    </div>
    <div class="pull-right ten">222</div>
    <div class="clearfix"></div>
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

</style>