<template>
<div>
<h2>Post categories</h2>
<hr>
<div v-for="category,index in categories">
<h5>{{category.category_name}}</h5>
<p>{{category.category_desc}}</p>
<div v-if="category.posts.length">
<h6>Posts</h6>
<p v-for="post in category.posts"><small>{{post.post_title}}</small></p>
</div>
</div>

</div>
</template>
<script>
export default
{
	name:'CreatePostCategory',
	data(){
        return{
          
          categories:{}
         
        }
    },
    beforeMount:function()
    {
    this.getCategories();
    },
	methods:
	{
	getCategories()
	{
	return this.axios.get('blog/categories').then((response)=>
	{
this.categories=response.data;
	}).catch((error)=>{console.log(error)})
	}
	

	}

}
</script>

<style>

</style>