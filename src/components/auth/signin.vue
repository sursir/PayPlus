<template>
  <validator name="validation">
    <form class="form-horizontal" novalidate>
      Email: <input type="email" v-model="credentials.email"
                    v-validate:email="{ required: true, minlength: 6, maxlength: 32 }"><br/>
      <div v-if="$validation.email.modified">
        <span v-if="$validation.email.required">ID is required</span>
        <span v-if="$validation.email.minlength">Your ID is too short.</span>
        <span v-if="$validation.email.maxlength">Your ID is too long.</span>
      </div>
      Password: <input type="password" v-model="credentials.password"
                       v-validate:password="{ required: true, minlength: 6, maxlength: 32 }"><br/>
      <div v-if="$validation.password.modified">
        <span v-if="$validation.password.required">ID is required</span>
        <span v-if="$validation.password.minlength">Your ID is too short.</span>
        <span v-if="$validation.password.maxlength">Your ID is too long.</span>
      </div>

      <h1>{{ error }}</h1>
      <button type="button" v-on:click="signin" :disabled="!$validation.valid">登录</button>
    </form>
  </validator>
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
    methods: {
      signin () {
        this.$http.post('auth/signin', {
          email: this.credentials.email,
          password: this.credentials.password
        }).then((resp) => {
          if (resp.status === 200) {
            window.localStorage.setItem('Token', resp.data.resp.token)
            this.$router.go('/apps')
          }
        }, (resp) => {
          this.$set('error', resp.data.msg)
        })
      }
    }
  }
</script>