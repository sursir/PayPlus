<template>
  <header class="u-max-full-width">
    <div class="container">
      <div class="row">
        <div class="navbar">
          <div class="two three-thirds columns">
            <a class="logo" v-link="{ path: '/' }">Pay Station</a>
          </div>
          <div class="ten columns">
            <nav class="u-pull-right">
              <ul>
                <li><a v-link="{ path: '/' }">首 页</a></li>
                <li><a v-link="{ path: '/download' }">下 载</a></li>
                <li><a v-link="{ path: '/docs' }">文 档</a></li>
                <li><a v-link="{ path: '/auth/signin' }">登 录</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="intro u-full-width text-center">
          <h1>Pay Station</h1>
          <p class="intro-text">
            便捷支付，一触即达
          </p>
          <a class="button button-primary" v-link="{ path: '/auth/signin' }">立即使用</a>
        </div>
      </div>
    </div>
  </header>

  <main>
    <section class="container">
      <div class="row">
        <div class="heading u-full-width text-center">
          <h4>快速、便捷</h4>
          <p>
            在任何你能想到的场景，一行代码轻松集成支付，集中管理支付记录。
          </p>
        </div>
        <hr class="split"/>

        <div class="feature">
          <div class="row">
            <div class="six columns text-center">
              <img src="../assets/images/fastpay.png" style="width: 50%" alt="FASTPAY">
            </div>
            <div class="six text-center columns content">
              <h4>便捷支付，一触即达</h4>
              <p>
                系统集成当前互联网主流在线支付方式（支付宝，微信，PayPal，网银），便捷支付一触即达。
              </p>
            </div>
          </div>

          <div class="row text-center feature-section">
            <div class="six columns content">
              <h4>一行代码，万千可能</h4>
              <p>
                系统提供基于 RESTful 设计的 API 接口，提供 JS, PHP 的 SDK 只需一行代码即可接入到支付系统。
              </p>
            </div>
            <div class="six columns text-center">
              <img src="../assets/images/rocket.png" style="width: 50%" alt="ROCKET">
            </div>
          </div>

          <div class="row text-center feature-section">
            <div class="six columns">
              <img src="../assets/images/customized.png" style="width: 50%" alt="customized">
            </div>
            <div class="six columns content">
              <h4>组件开发，灵敏扩展</h4>
              <p>
                系统采用现代 PHP 框架 Lumen 开发，支付方式均通过 event 挂载，快速方便集成您的自有支付接口。
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  @import "../assets/css/normalize/normalize.css";
  @import "../assets/css/skeleton/skeleton.css";
  @import "../assets/css/app/override.css";

  header {
    height: 500px;
    background-image: url(../assets/images/banner.png);
    background-position: 50%;
    font-weight: 100;
  }

  .navbar {
    padding-top: 30px;
  }

  @media screen and (max-width: 550px) {
    .navbar .ten {
      display: none;
    }
  }

  .navbar .logo {
    font-size: 1.8rem;
    text-decoration: none;
    color: #fff;
  }

  .navbar nav ul li {
    list-style: none;
  }

  .navbar li {
    width: auto;
    float: left;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 1.4rem;
  }

  .navbar li a {
    display: block;
    height: auto;
    font-size: 1.5rem;
    color: #fff;
    text-decoration: none;
  }

  .intro {
    color: #FFFFFF;
    margin-top: 8rem;
  }

  .intro h1 {
    font-weight: 100;
  }

  .intro .intro-text {
    font-size: 1.6rem;
  }

  a.button {
    font-size: 1.6rem;
  }

  .heading {
    padding-top: 100px;
    padding-bottom: 100px;
  }

  .heading p {
    font-size: 1.6rem;
  }

  .feature {
    margin-top: 150px;
  }

  .feature-section {
    margin-top: 150px;
  }

  .feature .content {
    font-size: 1.6rem;
  }

  footer {
    margin-top: 100px;
    height: 100px;
    background-color: #f5f5f5;
  }
  .footer {
    font-size: 1.4rem;
    text-align: center;
    line-height: 100px;
    color: #383838;
    font-weight: 100;
  }
  .footer p {
    margin-bottom: 0;
  }

</style>