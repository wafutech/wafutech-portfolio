<template>
<div class="container">
<h2>About Me</h2>
<p>{{about.bio}}</p>
</div>
</template>
<script>
export default{
	data(){
	return{
	about:{}
	}
	},
	created:function(){
	this.getAbout();
	},
	methods:{
	getAbout()
	{
	return this.axios.get('about').then((response)=>{
	this.about=response.data
	}).catch(error).then((error)=>{console.log(error)})
	}
	}
}
</script>