<template>
<div>
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">
<h3>New Blog Post Category</h3>
</div>
</div>
<div class="panel-body">

<form autocomplete="off" @submit.prevent="postCategory" method="post">
<div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Category Name:</label>
              <input type="text" name="category_name" v-model="category.category_name" v-validate="'required'">
              <div class="alert alert-danger help-block">
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
              <textarea class="form-control" v-model="category.category_desc"></textarea>
              </div>
               </div>
              </div>
</div>
</div>
</div>
</template>
<script>
</script>
export default
{
	name:'CreatePostCategory',
	data()
	{
	return
	{
	category:{}
	}

	},
	methods:
	{
	postCategory()
	{
	return this.axios.post('blog/categories',category).then((response)=>
	{
	console.log(response.data)
	})
	}
	

	}

}
<style>

</style>