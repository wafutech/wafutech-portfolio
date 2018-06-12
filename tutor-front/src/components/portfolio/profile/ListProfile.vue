<template>
<div>
<!--<div v-if="this.$store.state.authenticated">
<button class="btn btn-success pull-right">Admin</button>
</div>-->
<h5>Personal Information</h5>
<table class="table table-striped">
<tr v-for="profile in profiles">
<th>
Full Name:
</th>
<td>
{{profile.portfolio_name}}({{profile.nickname}})
</td>
<th>
Title:
</th>
<td>
{{profile.title}}
</td>

<th>
Bio:
</th>
<td>
{{profile.bio}}
</td>
<td>&nbsp;</td><td><router-link :to="{name: 'edit-profile', params: {id: profile.id}}" class="btn btn-primary">Edit</router-link></td>

</tr>
</table>


</div>
</template>
<script>
export default
{
	name:'ListProfile',
	data(){
        return{
          
          profiles:{}

        }
    },

    beforeMount: function()
        {
        this.getProfiles();

        },
	methods:
	{
	getProfiles()
	{
	return this.axios.get('profile').then((response)=>
	{
	this.profiles = response.data;
	});
	}
	}
}

</script>
<style>
</style>