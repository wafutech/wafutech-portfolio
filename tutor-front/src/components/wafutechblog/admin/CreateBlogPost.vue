<template>
  <div>
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">
<h3>New Post</h3>
</div>
</div>
<div class="panel-body">
 <form v-on:submit.prevent="saveBlogPost"> 

<div class="row">
<div class="col-md-9">


         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Post Title:</label>
              <input type="text" class="form-control" v-model="blogpost.post_title" name="post_title" v-validate="'required|max:200'"/> 
              <div class="help-block alert alert-danger" v-show="errors.has('post_title')">
          {{errors.first('post_title')}}
          </div>
                         
            </div>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Excerpt:</label>
             <textarea class="form-control" name="excerpt" v-model="blogpost.excerpt" v-validate="'max:300'"></textarea>
              <div class="help-block alert alert-danger" v-show="errors.has('excerpt')">
          {{errors.first('excerpt')}}
          </div>
                         
            </div>
          </div>
          </div>
          

           <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label>Post Content:</label>
            <wysiwyg v-model="post_content" name="post_content" v-validate="'required|min:300'"></wysiwyg>
            <div class="alert alert-danger help-block" 
            v-show="errors.has('post_content')">
                      {{errors.first('post_content')}}
            </div>
            </div>
            </div>
            </div>


          <!-- <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label>Post Content:</label>
            <textarea class="form-control" v-model="blogpost.post_content" name="post_content" v-validate="'required|min:300'" cols="20" rows="15"></textarea>
            <div class="alert alert-danger help-block" 
            v-show="errors.has('post_content')">
                      {{errors.first('post_content')}}
            </div>
            </div>
            </div>
            </div>-->
           
            <!--Autocomplete to input tags-->
            <div class="autocomplete">
            <input type="text" v-model="search" @input="onChange">
            <ul class="autocomplete-results" v-show="isOpen">
            <li class="autocomplete-result" v-for="(result,i) in  results" :key="i" @click="setResult(result)">{{result}}</li>
            </ul>
            </div>
            

          
</div>
<div class="col-md-3">
<div class="category">
          <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Post Category:</label>
 <div v-for="(cat,index) in categories">
          <input type="radio" :value="cat.id" id=":cat.category" v-model="blogpost.post_category_id">
          <label for=":cat.category_name">{{cat.category_name}}</label>
           <div class="help-block alert alert-danger" v-show="errors.has('post_category_id')">
          {{errors.first('post_category_id')}}
          </div>

          </div>
          {{blogpost.post_category_id}}
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-lg-12 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Tags</label>
              <input type="text" name="tag" v-model="tags.tag" v-validate="'required|min:3'">
              <div class="alert alert-danger help-block"
      v-show="errors.has('tag')">
                {{errors.first('tag')}}
      </div>
              </div>
              </div>
              </div>

           <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Publish</label>
              <input type="checkbox" value=true checked="yes" v-model="blogpost.published">Yes
              <input type="checkbox" value="false" v-model="blogpost.published">No
              </div>
              </div>
              </div>
</div>
</div>
</div>
{{post_content}}

   <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <button type="submit" class="btn btn-info">POST</button>
            </div>
            </div>
            </div>

</form>

<!--<div contenteditable="true" class="editable">
Editable div
</div>-->
</div><!--Close panel body-->
</div> <!--Close Panel-->
</div>
</template>
<script>

  export default {
   name:'CreateBlogpost',
    data(){
        return{
          
          tags:[],
          blogpost:{post_content:'',},
          categories:{},
          search:'',
          results:[],
          isOpen:false,
          post_content:''
        }
    },

    beforeMount: function()
        {
           this.getCategories();
           this.getTags();
        },
    methods: {
         
    saveBlogPost()
  {
  this.blogpost.post_content = this.post_content
  console.log(this.blogpost)
  return this.axios.post('blog/posts',this.blogpost).then((response)=>
  {
  console.log(response.data)
   this.$router.push({name: 'blog'})
  }).catch((error)=>{console.error})
  },
  getCategories()
  {
  return this.axios.get('blog/categories').then((resp)=>
  {
  this.categories=resp.data;
  })
  },

  getTags()
  {
  return this.axios.get('blog/tags').then((resp)=>
  {
  this.tags=resp.data;
  }).catch((error)=>{console.log(error)})
  },
  onChange()
  {
this.isOpen=true;
this.filterResults();
  },
  filterResults()
  {
  //this.results = this.tags.filter(tag=>tag.toLowerCase().indexOf(this.search.toLowerCase())>-1);
  this.results = this.tags.filter((tag)=>
  {
  return tag.toLowerCase().indexOf(this.toLowerCase())>-1
  })

  },
  setResult(result)
  {
  this.search= result;
  this.isOpen = false;
  }
}

}
</script>
<style>
.category
{
  margin:5px;
  background-color:light-green;
  padding:10px;
  display:inline;
}
div.editable
{
  width:300px;
  height:200px;

  border:1px solid #ccc;
  padding:5px;
}
strong
{
  font-weight:bold;
},
.autocomplete
{
  position:relative;
  width:130px;
}

.autocomplete-results
{
  padding:10;
  margin:0;
  border:120px;
  overflow:auto;
}

.autocomplete-result
{
  list-style:none;
  text-align:left;
  padding: 4px 2px;
  cursor:pointer;
}
.autocompete-result:hover
{
  background-color:#4AAE9B;
  color:white;
}

</style>