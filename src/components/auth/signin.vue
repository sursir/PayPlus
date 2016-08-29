<template>
  <main>
    <div class="four offset-by-four columns">
      <div class="u-full-width text-center">
        <h4>登 录</h4>
        <h6 v-show="error">{{ error }}</h6>
      </div>
      <validator name="validation">
        <form novalidate>
          <div class="u-full-width">
            <input type="email"
                   class="u-full-width"
                   autofocus="autofocus"
                   placeholder="请输入您的邮箱"
                   v-model="credentials.email"
                   v-validate:email="{ required: true, email: true }">
            <div class="helper" v-if="$validation.email.modified">
              <span v-if="$validation.email.email">邮箱格式不正确，请输入正确的邮箱</span>
            </div>
          </div>
          <div class="u-full-width">
            <input type="password"
                   class="u-full-width"
                   placeholder="请输入您的密码"
                   v-model="credentials.password"
                   v-validate:password="{ required: true, minlength: 6, maxlength: 32 }">
            <div class="helper" v-if="$validation.password.modified">
              <span v-if="$validation.password.minlength">密码不能低于 6 个字符</span>
              <span v-if="$validation.password.maxlength">密码不能大于 32 个字符</span>
            </div>
          </div>
          <div class="u-full-width">
            <button class="u-full-width" type="button" v-on:click="signin" :disabled="!$validation.valid">登 录</button>
          </div>
        </form>
      </validator>
    </div>
  </main>
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
          setTimeout(() => {
            that.$set('error', false)
          }, 2000)
        })
      }
    }
  }
</script>
<style scoped>
  @import "../../assets/css/normalize/normalize.css";
  @import "../../assets/css/skeleton/skeleton.css";
  @import "../../assets/css/app/override.css";

  main {
    margin-top: 10%;
  }

  main div.columns {
    padding-left: 5%;
    padding-right: 5%;
  }

</style>