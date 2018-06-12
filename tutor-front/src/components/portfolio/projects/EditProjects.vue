<template>
    <div>
    project: {{project}}
        <form v-on:submit.prevent="updateProject">   

       <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Project Title:</label>
              <input type="text" name="project_title" v-validate="'required|min:3|max:255'" class="form-control" v-model="project.project_title" />
              
          <div class="help-block alert alert-danger" v-show="errors.has('project_title')">
          {{errors.first('project_title')}}
          </div>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Tag line:</label>
              <input type="text" name="tag_line" v-validate="'max:255'" class="form-control" v-model="project.tag_line" />
              <div class="help-block alert alert-danger" v-show="errors.has('tag_line')">
          {{errors.first('tag_line')}}
          </div>
              
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Description:</label>
              
              <textarea v-model="project.project_desc" name="project_desc" class="form-control" v-validate="'required|min:30'"></textarea>
              <div class="help-block alert alert-danger" v-show="errors.has('project_desc')">
          {{errors.first('project_desc')}}
          </div>
              
            </div>
          </div>
        </div>

         <!--<div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Image:</label>
              <span class="help-block">
              Only images of format JPG,JPEG or PNG allowed.
              </span>
              <input type="file" name ="project_thumb_nail" id="project_thumbnail" class="form-control" v-validate="'required|image|mimes:image/jpeg,image/jpg,image/png|size:10000'" @change="getProjectImage" />
              <div class="help-block alert alert-danger" v-show="errors.has('project_thumbnail')">
          {{errors.first('project_thumbnail')}}
          </div>
              
            </div>
          </div>
        </div> -->  

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>URL:</label>
              <input type="url" name="url" v-validate="'url'" class="form-control" v-model="project.url" />
              <div class="help-block alert alert-danger" v-show="errors.has('url')">
          {{errors.first('url')}}
          </div>
              
            </div>
          </div>
        </div> 
         <div class="form-group">
          <button class="btn btn-info">Save Changes</button>
        </div>
        </form>
    </div>
</template>
<script>
export default
{
	data(){
        return{
          
          project:{
          },
           message:'Record Updated!',
          submitted:false
         
        }
    },

    beforeMount: function()
        {
           this.getProjects();
        },
        methods:{

        updateProject()
       {
       this.$validator.validateAll().then(()=>
      {
     return this.axios.post('projects',this.profile).then((resp)=>{
     this.submitted=true;
     this.$router.push({name:'portfolio'})
     })


        })
       },

       getProjects()
       {
      
        return this.axios.get(`projects/${this.$route.params.id}/edit`).then((response) => {
		this.project = response.data
		console.log('projects'+response.data)
       })

       
}


        }
    }
  
    

       
</script>