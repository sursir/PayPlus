<template>
  <div class="bg">
    <div class="container">
      <header>
        <div class="logo">
          <a v-link="{ path: '/' }">Pay Station</a>
        </div>
        <div class="menu">
          <nav>
            <ul>
              <li><a v-link="{ path: '/' }">首 页</a></li>
              <li><a v-link="{ path: '/download' }">下 载</a></li>
              <li><a v-link="{ path: '/auth/signin' }">登 录</a></li>
            </ul>
          </nav>
        </div>
      </header>

      <main>
        <div class="intro">
          <h1>Pay Station</h1>
          <p class="describe">
            便捷支付，一触即达
          </p>
        </div>
      </main>
    </div>
  </div>
</template>
<style scoped>
  .bg {
    font-family: "Microsoft YaHei UI", sans-serif;
    height: 100%;
    width: 100%;
    background: transparent linear-gradient(0deg, rgb(11, 65, 130) 1%, rgb(30, 136, 229) 100%) repeat scroll 0 0;
    font-size: 62.5%;
  }

  .container {
    max-width: 1200px;
    width:100%;
    margin:0 auto 0;
  }

  header {
    height: 50px;
    box-sizing: border-box;
    padding-top:20px;
  }

  .logo {
    float: left;
    max-width: 150px;
    width: 150px;
    text-align: center;
    line-height: 50px;
  }

  .logo a {
    font-size: 2em;
    color: #FFFFFF;
    text-decoration: none;
    font-weight: 300;
  }

  .menu {
    float: right;
    width: calc(100% - 200px);
  }

  .menu nav {
    float: right;
    width: 100%;
    box-sizing: border-box;
    padding-right: 20px;
    padding-left: 20px;
  }

  .menu nav ul {
    width: auto;
    float: right;
  }

  .menu nav ul li {
    list-style: none;
  }

  .menu nav li {
    width: auto;
    float: left;
    padding-left: 5px;
    padding-right: 5px;
    height: 30px;
    line-height: 30px;
    font-size: 1.4em;
    font-weight: 300;
    text-align: center;
  }

  .menu nav li a {
    text-decoration: none;
    color: #FFFFFF;
    display: block;
    width: auto;
    padding-left: 15px;
    padding-right: 15px;
    height: 100%;
    border: 1px solid transparent;
  }

  .menu nav li a:hover {
    border: 1px solid #FFFFFF;
    border-radius: 3px;
  }

  main .intro {
    margin-top: calc(100% / 5);
    text-align: center;
  }
  main .intro h1 {
    font-size: 5em;
    font-weight: 100;
    color: #FFFFFF;
  }
  main .intro p {
    color: #FFFFFF;
    font-size: 1.8em;
    font-weight: 100;
  }




</style>
