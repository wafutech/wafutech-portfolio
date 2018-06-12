<template>
  <div>
    <h3 class="title">Add Skills</h3>
    <div class="alert alert-success" v-show="success">
    Skill set Saved!
    </div>
    <form v-on:submit.prevent="addSkill"> 
            <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Skill:</label>
              <input type="text" name="skill" v-validate="'required'" class="form-control" v-model="skill.skill" />
              </div>
          <div class="help-block alert alert-danger" v-show="errors.has('skill')">
          {{errors.first('skill')}}
          </div>
          </div>
        </div>
<div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Description:</label>
              <textarea v-model="skill.skill_description" class="form-control" name="skill_description" v-validate="'required'">
              </textarea>
              </div>
          <div class="help-block alert alert-danger" v-show="errors.has('skill_description')">
          {{errors.first('skill_description')}}
          </div>
              
            
          </div>
        </div>
                               
          
        <br />

        <div class="form-group">
          <button class="btn btn-info">Save </button>
        </div>
    </form>
  </div>
</template>
<script>

  export default {
  name:'CreateSkills',

    data(){
        return{
          
          skill:{},
          success:false
        }
    },

    created: function()
        {
           
        },
    methods: {
         
    
      addSkill(){

      return this.axios.post('skills',this.skill).then((res)=>
      {
      console.log(res.data)
      this.success=true;
      })
     
       /* const config = {headers: {
        'Content-Type': 'application/json'
    */
    }
  }
}
</script>