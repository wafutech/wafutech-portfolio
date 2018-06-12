<template>
<div>
<!--<button class="btn btn-danger pull-right" @click="trancateProjects">Delete All Projects</button>-->
<br>
<table class="table table-bordered">
<tr v-for="project in projects">
<td>
{{project.created_at}}
</td>
<td>
<h5>{{project.project_title}}</h5>
<div class="project-picture">
<img :src="'http://127.0.0.1:8000/'+project.project_thumbnail" alt="Portfolio Image" width="400" height="400" class="img-thumbnail"/>
<p>{{project.project_desc}}</p>
<h4>Features</h4>
<ul>
<li v-for="features in project">{{features.feature}}</li>
</ul>
<h4>Technologies</h4>
<ul>
<li v-for="t in project_technologies">{{t.technology_id}}</li>
</ul>
</div>
</td>
<td>
<router-link :to="{name: 'edit-project', params: {id: project.id}}" class="btn btn-primary">Edit</router-link>

</td>

</tr>
</table>
</div>
</template>
<script>
export default
{
	name:'ListProjects',
	data(){
        return{
          
          projects:{},
          my_pic:'/images/projects/pic.png'


        }
    },

	beforeMount: function()
        {
        this.getProjects();

        },
	methods:
	{
	getProjects()
	{
	return this.axios.get('projects').then((response)=>
	{
	this.projects = response.data;
	});
	},

	trancateProjects()
	{
	window.confirm('This action will permanently remove all projects and files, Are sure about this?');
	return this.axios.get('trancate/projects').then((resp)=>{
	console.log(resp.data);
	})
	}

	}
}

</script>
<style>
</style>