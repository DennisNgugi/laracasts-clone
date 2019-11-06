<template>
<div>


  <ul class="list-group alert alert-danger" v-if="errors.length > 0">
    <li class="list-group-item" v-for="error in errors" :key="errors.indexOf(error)">{{error}}</li>
  </ul>
<form autocomplete="off">
    <div class="form-group">
        <input type="email" class="form-control" v-model="email" placeholder="Email">
    </div>

    <div class="form-group">
        <input type="password" class="form-control" v-model="password" placeholder="Password">
    </div>

    <div class="form-group flexbox py-10">
        <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" v-model="remember" checked>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Remember me</span>
        </label>

        <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
    </div>

    <div class="form-group">
        <button class="btn btn-bold btn-block btn-primary" @click.prevent="attemptLogin()" type="submit">Login</button>
    </div>
</form>
</div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            remember: true,
            errors:[]
        }

    },

    computed: {
        isValidLoginForm() {
            return this.emailIsValid() && this.password
        }
    },
    methods: {
        emailIsValid() {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                return (true)
            }
            return (false)
        },

        attemptLogin() {
          this.errors = []
            axios.post('/login', {
                email: this.email,
                password: this.password,
                remember: this.remember
            }).then(resp => {

                console.log(resp)
            }).catch(error => {
                console.log(error)
                if(error.response.status == 422){
                  this.errors.push("We couldnt verify your account details")

                }
                else{
                  this.errors.push("Something went wrong , please try again")
                }
            })
        }
    },

    mounted() {
        console.log('Login mounted.')
    }
}
</script>
