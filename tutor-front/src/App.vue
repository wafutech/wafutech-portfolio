<template>
<div>
<div class="row">
<div class="col-md-12 top-banner">
<div class="row">
<div class="col-md-2">
<img src="./assets/logo.png" width="100" height="100" alt="LOGO">
</div>
<div class="col-md-2">
<!---Empty column-->
</div>
<div class="col-md-6">
<div class="row">
<div class="col-md-4 img img-circle">
<div class="img-circle img-responsive">
<img src="./assets/avatar.png" width="150" height="160" alt="Profile Photo">
</div>
</div>
<div class="col-md-8">
<h3 id="hi">Hi!</h3>
<h3 id="wafula">My Name is Ronald Wafula</h3>
<p id="wafutech">Just Call me Wafutech</p>
<h3 id="full-stack">Full-Stack Web Developer</h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12 nav-bg pull-right">
    <Navbar></Navbar>
    </div>
    </div>


  
        
  
    <div class="row">
    <div class="col-md-2 right-col">
    </div>
    <div class="col-md-9 center-col">
      <router-view></router-view>

    </div>
    <div class="col-md-1">

    </div>
    </div>
<Footer></Footer>
    </div>
</template>

<script>
import Footer from './components/Footer';
import Navbar from './components/Navbar';

export default {
components:
        {
        
        Footer,
        Navbar

        
        
        },
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  width:100%;
}
.top-banner
{
  width:100%;
  height:300px;
  padding-top:0px;
  padding-bottom:30px;
  background-image:url('./assets/bg.jpg');
  background-size:cover;

}
.right-col
{
  background-color:brown;
  padding-right:50px;
}

.center-col
{
  background-color:#fff;
  padding:50px;
  border-top: solid 1px brown;
}

#hi
{
  color:#e9e26c;
}

#wafula
{
  color:#fff;
}

#wafutech
{
  color:brown;
}

#full-stack
{
  color:#17a2b8;
  font-size:20px;
}

.nav-bg
{
  background-image: url('./assets/wafutech.png');
   background-size:cover;
  background-size:100%;
}
</style>
