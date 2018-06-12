<template>
<div>
        <div class="row row1">
            <ul class="largenav">

            
                    <li class="upper-links">
                        <router-link :to="{ name: 'home' }">Portfolio</router-link>
                    </li>
                    <li class="upper-links">
                        <router-link :to="{ name: 'list-skills' }">My Skills</router-link>
                    </li>
                    <li class="upper-links">
                        <router-link :to="{ name: 'about' }">About Me</router-link>
                    </li>

                    <li class="upper-links">
                        <router-link :to="{ name: 'contact' }">Contact Me</router-link>
                    </li>
                     <li class="upper-links">
                        <router-link :to="{ name: 'blog' }">Blog</router-link>
                    </li>

                    <li class="upper-links ">
                        <router-link :to="{ name: 'login' }">Login</router-link>
                    </li>                    <li class="upper-links">
                        <router-link :to="{ name: 'register' }">Register</router-link>
                    </li>

                    <li class="upper-links">
                        <router-link :to="{ name: 'admin' }">Admin</router-link>
                    </li>

                    
                          
                
                               
                
            </ul>
        </div>
        
    
</div>
</template>
<script>
export default
{
	name: 'Navbar',

	
}


</script>
<style>
.row1{
    padding-top: 10px;
}

.row2 {
    padding-bottom: 20px;
}

.flipkart-navbar-input {
    padding: 11px 16px;
    border-radius: 2px 0 0 2px;
    border: 0 none;
    outline: 0 none;
    font-size: 15px;
     position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
}
#flipkart-navbar {    
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  width: 100%;
  padding-bottom: 50px;
  height: 200px;
  margin-bottom: 50px;
   background-color: #17a2b8;
    color: #FFFFFF;
    /*height: 400px;*/
}

#flipkart-navbar-blog {    
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  width: 100%;
  padding-bottom: 100px;
   background-color: #17a2b8;
    color: #FFFFFF;
    height: 200px;

}

.upper-links {
    display: inline-block;
    padding: 0 11px;
    line-height: 23px;
    font-family: 'Roboto', sans-serif;
    letter-spacing: 0;
    color: inherit;
    border: none;
    outline: none;
    font-size: 18px;

}

.largenav {
    display: block;
    padding-right: 30px;
}

</style>