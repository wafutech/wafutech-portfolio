<template>
<div>
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">
<h2>Categories</h2>
</div>
</div>
<div class="panel-body">
<div class="list-category" v-show="!show_category_form">
<ul>
<li v-for="(category,index) in categories" :key="category.id">{{category.category_name}}</li>
</ul>
</div>
<div v-show="!show_category_form">
<button class="btn btn-info" @click="createCategory">New Category</button>
</div>
<div v-show="show_category_form">
<h3>New Blog Post Category</h3>

<form autocomplete="off" @submit.prevent="postCategory" method="post">

          <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Category Name:</label>
              <input type="text" name="category_name" v-model="category.category_name" v-validate="'required'">
              <div class="alert alert-danger help-block" 
			v-show="errors.has('category')">
			          {{errors.first('category')}}
			</div>
              </div>
              </div>
              </div>
              <div class="row">
               <div class="col-md-10">
             <div class="form-group">
              <label>Description:</label>
              <textarea class="form-control" v-model="category.category_desc">
              </textarea>
              </div>
              </div>
              </div>

              <div class="row">
               <div class="col-md-10">
             <div class="form-group">
          <button type="submit" class="btn btn-info">POST</button>
          </div>
          </div>
          </div>
</form>
</div>
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
          
          category:{},
          categories:{},
          show_category_form:false
         
        }
    },

    beforeMount:function()
    {
    this.fetchCategories();
    },
	methods:
	{
	postCategory()
	{


	return this.axios.post('blog/categories',this.category).then((response)=>
	{
this.show_category_form=false;
	}).catch((error)=>{console.log(error)})
	},
  createCategory()
  {
  this.show_category_form=true;
  },
  fetchCategories()
  {
  return this.axios.get('blog/categories').then((resp)=>
  {
  this.categories=resp.data;
  }).catch((error)=>{console.log(error)})
  }
	

	}

}
</script>

<style>

</style>