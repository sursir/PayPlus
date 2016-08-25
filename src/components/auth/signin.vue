<template>
  <div class="bg"></div>
  <div class="clearfix"></div>
  <div class="signin-box">
    <div class="signin-header">
      <div class="colorful-box clearfix">
        <span class="colorful colorful-pink"></span>
        <span class="colorful colorful-blue"></span>
        <span class="colorful colorful-tsing"></span>
        <span class="colorful colorful-orange"></span>
        <span class="colorful colorful-purple"></span>
      </div>
      <div class="title">
        <h1>登 录</h1>
      </div>
      <span class="helper" v-show="error">{{ error }}</span>
    </div>
    <div class="signin-body">
      <validator name="validation">
        <form novalidate>
          <div class="input-group">
            <input type="email"
                   id="email"
                   autofocus="autofocus"
                   placeholder="请输入您的邮箱"
                   v-model="credentials.email"
                   v-validate:email="{ required: true, email: true }">
            <div class="helper" v-if="$validation.email.modified">
              <span v-if="$validation.email.email">邮箱格式不正确，请输入正确的邮箱</span>
            </div>
          </div>
          <div class="input-group">
            <input type="password"
                   id="password"
                   placeholder="请输入您的密码"
                   v-model="credentials.password"
                   v-validate:password="{ required: true, minlength: 6, maxlength: 32 }">
            <div class="helper" v-if="$validation.password.modified">
              <span v-if="$validation.password.minlength">密码不能低于 6 个字符</span>
              <span v-if="$validation.password.maxlength">密码不能大于 32 个字符</span>
            </div>
          </div>
          <div class="signin-footer">
            <p><a v-link="{ path: '/auth/forgot' }">忘记密码？</a></p>
            <button type="button" v-on:click="signin" :disabled="!$validation.valid">登 录</button>
          </div>
        </form>
      </validator>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        credentials: {
          email: '',
          password: ''
        },
        error: ''
      }
    },
    ready () {
      this.init()
    },
    validators: {
      email (val) {
        return /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/.test(val)
      }
    },
    methods: {
      init () {
        document.title = '登录'
      },
      signin () {
        document.querySelector('button').setAttribute('disabled', 'disabled') // disabled button
        this.$http.post('auth/signin', {
          email: this.credentials.email,
          password: this.credentials.password
        }).then((resp) => {
          if (resp.status === 200) {
            window.localStorage.setItem('Token', resp.data.resp.token)
            this.$router.go('/app')
          }
        }, (resp) => {
          this.$set('error', resp.data.msg)
          let that = this
          setTimeout(function () {
            that.$set('error', false)
          }, 2000)
        })
      }
    }
  }
</script>
<style scoped>
  @import "../../assets/css/common.css";

  .bg {
    background-image: url(../../assets/images/bg.jpg);
    background-position: center center;
    height: 100%;
    width: 100%;
    position: absolute;
    z-index: -999;
  }

  .signin-box {
    width: 400px;
    height: auto;
    background-color: #fff;
    margin: 10% auto 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }

  .signin-header {
    width: 100%;
    text-align: center;
  }

  .colorful-box {
    width: 100%;
    height: 2px;
  }

  .colorful {
    display: block;
    float: left;
    width: 20%;
  }

  .colorful-pink {
    border-radius: 3px 0 0 0;
    border-top: 2px solid #EB9387;
  }

  .colorful-blue {
    border-top: 2px solid #8FB2F4;
  }

  .colorful-tsing {
    border-top: 2px solid #A3D08F;
  }

  .colorful-orange {
    border-top: 2px solid #FFD576;
  }

  .colorful-purple {
    border-radius: 0 3px 0 0;
    border-top: 2px solid #B287BF;
  }

  .signin-header .title {
    margin-top: 50px;
  }

  .signin-header h1 {
    margin-top: 0;
    font-size: 2.2rem;
    color: #737373;
    font-weight: 200;
  }

  .signin-body {
    padding: 20px 50px 40px 50px;
  }

  .signin-box .input-group {
    width: 100%;
    box-sizing: border-box;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .input-group input {
    width: 100%;
    height: 40px;
    box-sizing: border-box;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    font-size: 1.5rem;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #eeeeee;
    color: #222222;
  }

  .input-group input:hover,.input-group input:focus {
    border-bottom: 1px solid #00AAEF;
  }

  .helper {
    font-size: 1.2rem;
    color: #f74a12;
    line-height: 25px;
  }

  .signin-footer p > a{
    font-size: 1.4rem;
    color: #737373;
    text-decoration: none;
  }
  .signin-footer p > a:hover,.signin-footer p > a:focus {
    color: #00AAEF;
  }

  button {
    margin-top: 10px;
    width: 100%;
    height: 50px;
    border: 1px solid transparent;
    font-size: 1.8rem;
    color: #fff;
    background-color: #00AAEF;
    cursor: pointer;
  }

  button:disabled {
    background-color: #CDCDCD;
  }

</style>