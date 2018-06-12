<template>
<div>
<div class="container-fluid footer-top">
        <div class="">
        <hr />
        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-offset-2" id="follow-me">
        Follow Me
        <hr>
        </div>
        </div>
        <div class="row">
            <div class="col-md-2">

                <a href="#">Facebook</a>
            </div>
            <div class="col-md-2">
           <a href="#">Twitter</a>

            </div>
        <div class="col-md-2">
           <a href="#">WhatsUp</a>

                    </div>
        <div class="col-md-2">
          <a href="#">Instagram</a>
            </div>
        <div class="col-md-2">
          <a href="#">Github</a>
            </div>

        </div>
        
        
    </div>
        <hr>
<!--Footer bottom-->
         <div class="row">
            <div class="col-md-12 footer-copyright">
        <p class="muted credit">&copy;  {{ new Date().getFullYear() }} Wafutech &amp; Full-Stack Developer.</p>
            </div>
        </div>
        
    </div>
</div>
</template>
<script>
export default
{
	name: 'Footer',

	
}


</script>
<style>
.footer-top
{
  color: #17a2b8;
    background-color: #000;
    display: block;
    position: relative;
    bottom: 0;
    left: 0;
    margin-bottom: -100px;
    margin-left: 0px;
    margin-right: 0px;
    border-top: solid 3px #17a2b8;

}

.footer-top a
{
  color: #17a2b8;
  padding-left: 20px;
  line-height: 30px;
  text-align: left;
}

.footer-copyright
{
  text-align: center;
  color: #ffc;
}
#follow-me
{
	color:#fff;
	font-size:20px;
	text-align:center;
	line-spacing:3px;
}
hr
{
	color:#fff;
	border-color:#fff;
	
}
</style>