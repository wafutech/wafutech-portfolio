<template>
<div>
<h2>Create Portfolio</h2>
<p>Its time to build your portfolio and showcase your skills and projects</p>
<button class="btn btn-success" v-on:click="Start()" v-show="start">Start</button>
<div v-if="show_profile_form">
<CreateProfile></CreateProfile>
</div>
<div v-show="add_projects">
<CreateProject></CreateProject>
</div>
</div>
</template>
<script>
import CreateProfile from '../../components/portfolio/profile/CreateProfile';
import CreateProject from '../../components/portfolio/projects/CreateProject';

export default
{
	components:
        {
        CreateProfile,
        CreateProject
               
        
        },

     data(){
        return{
          
          start:true,
          add_projects:false,
          show_profile_form:false
        }
    },

       methods:
      {
      Start()
      {
      this.show_profile_form=true;
      this.start = false;
      }


      }
}
</script>