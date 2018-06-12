<template>
    <div>
        <div class="alert alert-danger" v-if="error">
            <p>There was an error, unable to sign in with those credentials.</p>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="user@example.com" v-model="logindata.email" v-validate="'required|email'">
                <div class="help-block alert alert-danger" v-show="errors.has('email')">
          {{errors.first('email')}}
          </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" v-model="logindata.password" v-validate="'required|min:4'">
                <div class="help-block alert alert-danger" v-show="errors.has('password')">
          {{errors.first('password')}}
          </div>
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
        </form>
    </div>
</template>

<script>
  export default {
  name: 'Login',
    data(){
      return {
        email: null,
        password: null,
        error: false,
        logindata:{}
        
       
      }
    },
    methods: {
      login(){
      return this.axios.post('auth/login',this.logindata).then((resp)=>{
      console.log(resp.data)
      this.$router.push({name: 'admin'})

      }).catch((error)=>{console.log(error)})
        
            
              
      },

     
    }
  } 
</script>
