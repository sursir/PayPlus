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
              <li><a v-link="{ path: '/auth/signin' }">登 录</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="clearfix"></div>
      <!--Header End-->
      <div class="introduce text-center">
        <h1>Pay Station</h1>
        <p>便捷支付，一触即达</p>
      </div>
    </div>
    <div class="clearfix"></div>
  </header>

  <main>
    <div class="container">
      <div class="row">
        <div class="p50 text-center pull-left">
          <img style="width: 50%" src="../assets/images/fastpay.png" alt="">
        </div>
        <div class="p50 pull-left">
          <div class="text-area">
            <h1>便捷支付，一触即达</h1>
            <p>
              系统集成当前互联网主流在线支付方式（支付宝，微信，PayPal，网银），便捷支付一触即达。
            </p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="row pt-100">
        <div class="p50 pt-20 pull-left">
          <div class="text-area">
            <h1>一行代码，万千可能</h1>
            <p>
              系统提供基于 RESTful 设计的 API 接口，提供 JS, PHP 的 SDK 只需一行代码即可接入到支付系统。
            </p>
          </div>
        </div>
        <div class="p50  text-center pull-left">
          <img style="width: 50%" src="../assets/images/rocket.png" alt="">
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="row pt-100">
        <div class="p50 text-center pull-left">
          <img style="width: 50%" src="../assets/images/customized.png" alt="">
        </div>
        <div class="p50 pull-left">
          <div class="text-area">
            <h1>组件开发，灵敏扩展</h1>
            <p>
              系统采用现代 PHP 框架 Lumen 开发，支付方式均通过 event 挂载，快速方便集成您的自有支付接口。
            </p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </main>

  <footer>
    <div class="container">
      <div class="footer">
        <p>Copyright © 2016-2026 All Rights Reserved.</p>
      </div>
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
    background-image: url(../assets/images/banner.png);
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
    color: #ffffff;
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
    color: #ffffff;
    text-decoration: none;
  }

  .menu li a:hover {
    border:1px solid #ffffff;
  }

  .introduce {
    color: #ffffff;
    margin-top: 8%;
    width:100%;
  }

  .introduce h1 {
    font-size: 5rem;
    font-weight: 100;
  }

  .introduce p {
    font-size: 1.8rem;
    font-weight: 100;
  }

  main {
    margin-top: 100px;
  }

  .p50 {
    width: 50%;
  }
  .pt-100 {
    padding-top:100px;
  }
  .text-area {
    color: #222;
  }
  .text-area h1 {
    font-size: 3rem;
    font-weight: 100;
  }
  .text-area p {
    font-size: 1.6rem;
    line-height: 2em;
    font-weight: 100;
  }
  
  footer {
    margin-top:100px;
    height:100px;
    background-color: #F5F5F5;
  }
  .footer {
    font-size: 1.4rem;
    text-align: center;
    line-height: 100px;
    color: #383838;
    font-weight: 100;
  }
  .footer p {
    margin:0;
    padding:0;
  }

</style>
