<template>
  <header>
    <div class="container">
      <!--Header-->
      <div class="header">
        <div class="logo pull-left">
          <a v-link="{ path: '/' }">Pay Station</a>
        </div>
        <div class="menu pull-right">
          <nav>
            <ul>
              <li><a v-link="{ path: '/' }">首 页</a></li>
              <li><a v-link="{ path: '/download' }">下 载</a></li>
              <li><a v-link="{ path: '/docs' }">文 档</a></li>
              <li><a class="signin-btn" v-link="{ path: '/auth/signin' }">登 录</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="clearfix"></div>
      <!--Header End-->
      <div class="introduce pull-left">
        <h1>Pay Station</h1>
        <p>便捷支付，一触即达</p>
      </div>
    </div>
    <div class="clearfix"></div>
  </header>

  <main>
    <div class="container">
      111
    </div>
  </main>

  <footer>
    <div class="container">
      222
    </div>
  </footer>

</template>
<script>
  export default {
    ready () {
      this.init()
    },
    methods: {
      init () {
        document.title = 'Pay Station'
      }
    }
  }
</script>
<style scoped>
  @import "../assets/css/common.css";

  header {
    width: 100%;
    height: 500px;
    background-image: url(../assets/images/index-bg.png);
    background-position: center center;
    font-weight: 100;
  }

  .container {
    width: 1100px;
    margin: 0 auto;
  }

  .header {
    padding-top: 20px;
    height: 50px;
  }

  .logo {
    line-height: 40px;
  }

  .logo a {
    font-size: 1.8rem;
    text-decoration: none;
    color: #E7E7E8;
  }

  .menu nav ul li {
    list-style: none;
  }

  .menu nav ul {
    width: 100%;
  }

  .menu li {
    width: auto;
    float: left;
    padding-left: 10px;
    padding-right: 10px;
    font-size: 1.4rem;
  }

  .menu li a {
    display: block;
    height: auto;
    font-size: 1.5rem;
    padding: 3px 10px 3px 10px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 1px solid transparent;
    color: #757881;
    text-decoration: none;
  }

  .menu li a:hover {
    color: #E7E7E8;
    border:1px solid #757881;
  }

  .introduce {
    color: #ffffff;
    margin-top: 8%;
  }

  .introduce h1 {
    font-size: 5rem;
    font-weight: 100;
  }

  .introduce p {
    font-size: 1.8rem;
    font-weight: 100;
  }

</style>
