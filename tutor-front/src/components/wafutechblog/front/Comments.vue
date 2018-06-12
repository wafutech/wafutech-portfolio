<template>
<div>
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">
<h3>Your Comment</h3>
</div>
</div>
<div class="panel-body">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>Date</th><th>Comment</th><th>Author:</th><th>Approved</th><th>Actions</th>
</tr>
<tr v-for="(comment,index) in comments">
<td>{{comment.created_at}}</td>
<td>{{comment.comment}}</td>
<td>{{comment.author}}</td>
<td>{{comment.approved}}</td>
<td>Approve,Block,Remove</td>

</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
</template>
<script>

export default
{
	name:'Comments',
		data(){
        return{
          
         
          comments:{}
         
        }
    },
    beforeMount:function()
    {
    this.getComments();
    },
	methods:
	{

	getComments()
	{
	return this.axios.get('blog/post/comments').then((resp)=>
	{
	this.comments=resp.data;
	console.log(this.comments)
	}).catch((error)=>{console.log(error)})
	}

	}

}
</script>
<style>

</style>