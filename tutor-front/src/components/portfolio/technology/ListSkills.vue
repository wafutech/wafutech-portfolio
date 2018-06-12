<template>
    <div>
    <button class="btn btn-success pull-right" v-show="show_create_skills_btn" @click="createSkillsForm">New Skill</button>

        <h3 class="title">Skills</h3>
             
      <div v-for="skill in skills">
      <h3>{{skill.skill}}</h3>
          <p>{{skill.skill_description}}</p>
              </div>
              <div v-show="show_create_skills">
              <CreateSkills></CreateSkills>
              </div>
    </div>
</template>


<script>
import CreateSkills from './CreateSkills';

    export default {
      name:'Listskills',
      components:
        {
        CreateSkills
        },

        data(){
            return{
                skills: [],
                show_create_skills_btn:true,
                show_create_skills:false

               
            }
        },

        created: function()
        {
            this.fetchSkills();
        },

        methods: {
            fetchSkills()
            {
             var baseURL = this.baseURL;
              let uri = baseURL+'skills';
              return this.axios.get('skills').then((response) => {
                  this.skills = response.data;
                  return Promise.resolve(response.data);
              });
            },
            

            deleteSkill(id)
            {
                         var baseURL = this.baseURL;

              let uri = baseURL+'skills/${id}';

             this.skills.splice(id, 1);
              this.axios.delete(uri).then((response)=>
              {
             console.log(response.data);
              });
              },

            createSkillsForm()
            {
            this.show_create_skills=true;
            this.show_create_skills_btn=false;
            }
        }
    }
</script>
<style>
h3
{
  color:brown;
  
}
</style>