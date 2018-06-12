<template>
<div>
<h1>{{post.post_title}}{{post.post_category_id}}</h1>

<hr>
<div class="excerpt">
<h4>{{post.excerpt}}</h4>
</div>
<div v-for="line in post.post_content.split('\n')" class="post">
<p v-html="line"></p>
</div>
<hr>
<div class="comments">
<div class="alert alert-warning" v-show="no_comment">
{{no_comments}}
</div>
<!--Comment Form-->
<div>
<PostComment></PostComment>
</div><!--Comment form-->
<div v-show="!no_comment"><!--Comment Messages-->
<hr>
<h3>Comments</h3>
<hr>
<div v-for="com in comments">

<p>{{com.comment}}</p>
<br>
<hr>

</div>
</div><!--end comment messages-->

</div>
</div>
</div>
</template>
<script>
import PostComment from '../../../components/wafutechblog/front/PostComment';
export default
{
name:'BlogPost',
components:
        {
        PostComment
                 
        },

 data(){
            return{
                post: {},
               comments:[],
                no_comments:'There is not comment yet, be the first to comment',
                no_comment:false,
                category_id:''
               
            }
        },
	 created: function()
        {
            this.getPost();
            this.getRalatedArticles();
            this.getPostComments();
        },
	methods:
	{
	getPost()
            {
              
 
    return this.axios.get(`blog/posts/${this.$route.params.id}`).then((response) => {

                    this.post = response.data;
                });        

 },

 getPostComments()
 {

 return this.axios.get(`post/comments/${this.$route.params.id}`).then((response) => {

                    this.comments = response.data;
                    if(this.comments.length==0)
                    {
                    this.no_comment=true;
                    }
                   
                });  
 },

        getArticleComments()
        {


        return this.axios.get(`post/comments/${this.$route.params.id}`).then((response) => {

                    this.comments = response.data;
                    if(this.comments.length==0)
                    {
                    this.no_comment=true;
                    }
                   
                }); 
        },

        getRalatedArticles()
        {
            this.category_id = this.post.post_category_id;
            alert(this.category_id);
        }


	

	}
}
</script>
<style>
hr
{
    width:3px;
    color:#eee;
}
.post
{
  text-align:justify;
  line-spacing:3px;  
}
.excerpt
{
    background-color:#eee;
    padding:5px;
}
</style>