<template>
<div>
<div class="jumbtron">
<h2>Admin Panel</h2>

</div>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-title">
<table class="table">
<tr>
<td>
<button class="btn btn-default" @click="CreateProfileForm"> Profile</button>
</td>
<td>
<button class="btn btn-default" @click="CreatePortfolioForm"> Portfolio</button>
</td>

<td>
<button class="btn btn-default" @click="addTechForm">+Technologies</button>
</td>
<td>
<button class="btn btn-default" @click="addSkillForm">+Skills</button>
</td>

<td>
<button class="btn btn-default" @click="showBlog">Blog</button>
</td>
</tr>
</table>
</div>
</div>
<div class="panel-body">
<div v-show="show_profile_form">
<CreateProfile></CreateProfile>
</div>
<div v-show="show_portfolio_form">
<CreateProject></CreateProject>
</div>
<div v-show="show_tech_form">
<CreateTechnologies></CreateTechnologies>
</div>

<div v-show="show_skills_form">
<CreateSkills></CreateSkills>
</div>
<div v-show="show_blog">
<Blog></Blog>
</div>

</div>
</div>

</div>
</template>
<script>
import CreateProfile from '../../components/portfolio/profile/CreateProfile';
import CreateProject from '../../components/portfolio/projects/CreateProject';
import CreateSkills from '../../components/portfolio/technology/CreateSkills';
import CreateTechnologies from '../../components/portfolio/technology/CreateTechnologies';
import Blog from '../../components/wafutechblog/admin/Blog';

export default
{
	components:
        {
        CreateProfile,
        CreateProject,
        CreateSkills,
        CreateTechnologies,
        Blog

               
        
        },

     data(){
        return{
          
          show_tech_form:false,
          show_skills_form:false,
          show_profile_form:false,
          show_portfolio_form:false,
          show_blog:false
        }
    },

       methods:
      {
      CreateProfileForm()
      {
      this.show_profile_form=true;
      this.show_skills_form = false;
      this.show_tech_form = false;
      this.show_portfolio_form=false;
      },

      CreatePortfolioForm()
      {
      this.show_portfolio_form=true;
      this.show_profile_form=false;
      this.show_skills_form = false;
      this.show_tech_form = false;
      },

      addTechForm()
      {
      this.show_profile_form=false;
      this.show_skills_form = false;
      this.show_tech_form = true;
      this.show_portfolio_form=false;
      },

      addSkillForm()
      {
      this.show_profile_form=false;
      this.show_skills_form = true;
      this.show_tech_form = false;
      this.show_portfolio_form=false;
      },

      showBlog()
      {
      this.show_profile_form=false;
      this.show_skills_form = false;
      this.show_tech_form = false;
      this.show_portfolio_form=false;
      this.show_blog=true;

      }


      }
}
</script>