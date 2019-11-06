<template>


        <form>
          <div class="form-group">
            <input type="email" class="form-control"  placeholder="Email">
          </div>

          <div class="form-group">
            <input type="password" class="form-control"  placeholder="Password">
          </div>

          <div class="form-group flexbox py-10">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input"  checked>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Remember me</span>
            </label>

            <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
          </div>

          <div class="form-group">
            <button class="btn btn-bold btn-block btn-primary" :disabled="!isValidLoginForm" type="submit">Login</button>
          </div>
        </form>
</template>

<script>
    export default {
      data(){
        return{
          email:'',
          password:'',
          remember:true
        }

      },

      computed :{
        isValidLoginForm(){
          return this.emailIsValid() && this.password
        }
      },
      methods:{
        emailIsValid(){
     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
     {
    return (true)
      }
    return (false)
      }
    },
        mounted() {
            console.log('Login mounted.')
        }
    }
</script>
