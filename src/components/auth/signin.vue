<template>
  <div class="signin-box">
    <div class="signin-header">
      <h1>登 录</h1>
      <span v-if="error">{{ error }}</span>
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
          <button type="button" v-on:click="signin" :disabled="!$validation.valid">登 录</button>
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
        })
      }
    }
  }
</script>
<style scoped>
  .signin-box {
    width: 400px;
    height: auto;
    background-color: #fff;
    margin: 10% auto 0;
    border-radius: 10px;
    box-shadow: 1px 1px 15px rgba(235, 235, 235, 0.8);
    box-sizing: border-box;
    padding: 50px;

    font-size: 62.5%;
  }

  .signin-header {
    width: 100%;
    text-align: center;
  }

  .signin-header h1 {
    margin-top: 0;
    font-size: 3em;
    color: #CACACA;
    font-weight: 200;
  }

  .signin-box .input-group {
    width: 100%;
    box-sizing: border-box;
    padding-top:10px;
    padding-bottom: 10px;
  }
  .input-group input {
    width:100%;
    height: 50px;
    box-sizing: border-box;

    padding-top: 10px;
    padding-bottom: 10px;
    padding-left:20px;
    padding-right:10px;

    border: 1px solid #CDCDCD;
    border-radius: 30px;
    font-size: 1.5em;

    color: #222;
  }
  .helper {
    font-size: 1.2em;
    padding-left: 20px;
    color: #FF0000;
    line-height: 25px;
  }

  button {
    margin-top: 10px;
    width: 100%;
    height:50px;
    border: 1px solid transparent;
    border-radius: 30px;
    font-size: 1.8em;
    color: white;
    background-color: #1B7DD6;
    cursor: pointer;
  }
  button:disabled {
    background-color: #CDCDCD;
  }

</style>