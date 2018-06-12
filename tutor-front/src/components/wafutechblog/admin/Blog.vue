<template>
<div class="container">
<hr>
<div class="panel panel-warning">
<div class="panel-heading">
<div class="panel-title">
<h2>Wafutech Blog</h2>
</div>
</div>
<div class="panel-body">
<hr>
<div class="row">
<!--Navigation-->
<div class="col-md-2">
<div class="row">
<div class="col-md-12">
<hr>
<table class="table table-striped">
<tr>
<td>
<h4><small>Blog Posts</small></h4>

<button class="btn btn-warning" @click="CreatePost"> New Post</button>
</td>
</tr>
<hr>
<tr>
<td>

<button class="btn btn-warning" @click="ShowPosts">Posts</button>
</td>
</tr>
<hr>
<h4><small>Categories</small></h4>

<button class="btn btn-warning" @click="CreateCategory"> New Category</button>
</td>
</tr>
<hr>

<button class="btn btn-warning" @click="ShowCategory"> Category List</button>
</td>
</tr>
<hr>
<h4><small>Comments</small></h4>

<button class="btn btn-warning" @click="ShowComments"> Comments</button>
</td>
</tr>
<hr>
</table>
</div>
</div>
</div>
<!--Blog body-->
<div class="col-md-10 display-unit">

<div class="panel panel-success">
<div class="panel-heading">
<div class="panel-title">

</div>
</div>
<!--Panel body-->
<div class="panel-body">

<div v-show="show_new_post_form">
<CreateBlogPost></CreateBlogPost>
</div>

<div v-show="show_posts">
<BlogPosts></BlogPosts>
</div>

<div v-show="show_category_form">
<CreatePostCategory></CreatePostCategory>
</div>

<div v-show="show_categories">
<ListPostCategories></ListPostCategories>
</div>
<div v-show="show_comments">
<Comments></Comments>
</div>


</div>

</div> <!--Panel end-->


</div>
</div>

</div>
</div>
</div>
</template>
<script>
import BlogPosts from '../../../components/wafutechblog/front/BlogPosts';
import BlogPost from '../../../components/wafutechblog/front/BlogPost';
import Comments from '../../../components/wafutechblog/front/Comments';
import CreateBlogPost from '../../../components/wafutechblog/admin/CreateBlogPost';
import CreatePostCategory from '../../../components/wafutechblog/admin/CreatePostCategory';
import ListPostCategories from '../../../components/wafutechblog/admin/ListPostCategories';

export default
{
	components:
	{
	BlogPosts,
	BlogPost,
	Comments,
	CreateBlogPost,
	CreatePostCategory,
	ListPostCategories

	},

	data(){
        return{
          
         show_comments:false,
         show_category_form:false,
         show_posts:false,
         show_new_post_form:true,
         show_categories:false

        }
    },

    methods:
    {
    CreatePost()
    {
         this.show_comments=false,
         this.show_category_form=false,
         this.show_posts=false,
         this.show_new_post_form=true,
         this.show_categories=false
    },

    ShowPosts()
    {
         this.show_comments=false,
         this.show_category_form=false,
         this.show_posts=true,
         this.show_new_post_form=false,
         this.show_categories=false
    },

    CreatePost()
    {
         this.show_comments=false,
         this.show_category_form=false,
         this.show_posts=false,
         this.show_new_post_form=true,
         this.show_categories=false

    },
    ShowComments()
    {
        this.show_comments=true,
         this.show_category_form=false,
         this.show_posts=false,
         this.show_new_post_form=false,
         this.show_categories=false
    },

    CreateCategory()
    {
           this.show_comments=false,
         this.show_category_form=true,
         this.show_posts=false,
         this.show_new_post_form=false,
         this.show_categories=false
    },
    ShowCategory()
    {
         this.show_comments=false,
         this.show_category_form=false,
         this.show_posts=false,
         this.show_new_post_form=false,
         this.show_categories=true
    }


    }
}
</script>
<style>
.display-unit
{
	position:relative;
    left:100px;
}
</style>
