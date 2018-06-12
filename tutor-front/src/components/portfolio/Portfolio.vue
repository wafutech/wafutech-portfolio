<template>
<div>
<h2>My Portfolio</h2>
<hr>
<ListProfile></ListProfile>
<hr>
<h5>Recent Project</h5>
<ListProjects></ListProjects>

</div>
</template>
<script>

import ListProfile from '../../components/portfolio/profile/ListProfile';
import ListProjects from '../../components/portfolio/projects/ListProjects';

export default
{
	components:
        {
        ListProfile,
        ListProjects      
      
        
        },

     data(){
        return{
          
          
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