<template>
<div class="comment-wrapper">

<hr>
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">
<h3>Your Comment</h3>

</div>
</div>
<div class="panel-body">
<div v-show="success_message" class="alert alert-success">
Comment Posted Succefully!
</div>
<form autocomplete="off" @submit.prevent="postComment" method="post">
<div class="row">
<div class="col-md-10">
<div class="form-group">
<textarea v-model="comment.comment" class="form-control" name="comment" v-validate="'required'" cols="20" rows="9"> 

</textarea>
<div class="alert alert-danger help-block" v-show="errors.has('comment')">

 {{errors.first('comment')}}
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-10">
<div class="form-group">
 <button type="submit" class="btn btn-info">POST COMMENT</button>
 </div>
 </div>
 </div>
</form>

<hr>

</div>
</div>
</div>
</template>
<script>

export default
{
	name:'PostComment',
	 data(){
            return{
                comment: {
                "post_id":3,
                comment_parent_id :0,
                },
                success_message:false
               
            }
        },

	
	methods:
	{
	postComment()
	{
	return this.axios.post('blog/post/comments',this.comment).then((response)=>
	{
	this.success_message=true;
	}).catch((error)=>{console.log(error)})
	},


	}

}
</script>
<style>
.comment-wrapper
{
	border:solid 1px grey;
	padding-top:20px;
	padding-bottom:10px;
	padding-left:10px;
}
</style>