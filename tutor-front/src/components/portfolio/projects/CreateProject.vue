<template>
<div class="container">
<div class="alert alert-success" v-show="showSuccessMessage">
<p>The Project details completed successfully</p>
<div class="row">
<div class="col-md-4">
<button class="btn btn-info" @click="addMoreProjects">Add More</button>
</div>
<div class="col-md-4">
<button class="btn btn-primary" @click="viewPortfolio">View Portfolio</button>
</div>
</div>
</div>
<!-- PROJECT DETAILS -->

<div v-show="showProjectDetailSection">
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

        <div class="row">
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
        </div>   

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

  <div class="row">
<div class="col-md-10">
<button class="btb btn-info" @click="saveProject">Save & Continue</button>
</div>
</div>



</div>







<!--PROJECT FEATURES-->
<div v-show="showProjectFeatures">

<h3>Project Features</h3>
<div v-for="feature in features">
<div class="row">
<div class="col-md-10">
<input type="text" v-model="feature.feature">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6" v-show="!done">
<button @click="addFeature" class="btn btn-default">
    New Feature
  </button>
</div>
<div class="col-md-6">
<button @click="saveFeatures" class="btn btn-success">
    Done
  </button>
</div>
</div>
</div>

<!--<input type="email" @keyup="email = $event.target.value" class="form-control" id="email" placeholder="Username (your work email)">-->

<!--END OF PROJECT FEATURES-->




<!-- PROJECT TECHNOLOGIES-->

<div v-show="showProjectTechs">
<h3>Technologies</h3>
<hr>
<div class="row">
          <div class="col-md-10">
          <input type="hidden" v-model="project_id">
          <div v-for="(tech,index,technology_id) in technologies">
          
          <input type="radio" :value="tech.id" id=":tech.technology" v-model="selectedTechs[index]" @click="addToTechnologies">
          <label for=":tech.technology">{{tech.technology}}</label>
          </div>
                    
            </div>
            </div>
            <br>
            <hr>

<div class="row">
<div class="col-md-10">
<button class="btb btn-info" @click="saveTechs">Save & Continue</button>
</div>
</div>

</div>
<!--END OF PROJECT TECHNOLOGIES-->



</div>
</template>
<script>
var qs = require('qs');
var assert = require('assert');
export default{
  data(){
  return{
  features:[],
  project_id:null,
   project_picture:null,
   project:{},
  /*email:'',
  emails:[],*/
  done:false,
  showProjectFeatures:false,
  showProjectDetailSection:true,
  showProjectTechs:false,
  technologies:[],
  selectedTechs:[],
  selectedTechnologies:[],
  showSuccessMessage:false

  }
  },

  beforeMount: function()
        {
        this.fetchTechnologies();

      },

  methods:{

  //Save project features
      saveProject(){
      
      this.$validator.validateAll().then(()=>{
      const fd = new FormData();        
        fd.append('project_thumbnail',this.project_picture,this.project_picture.name)
       fd.append('project_title',this.project.project_title)
       fd.append('tag_line',this.project.tag_line)
       fd.append('project_desc',this.project.project_desc)
       fd.append('url',this.project.url)
       return this.axios.post('portfolio/projects',fd).then((response) => {
         this.project_id = response.data
          console.log(response.data)
          this.showProjectFeatures=true

        }).catch((error)=>{
          this.showProjectFeatures=false

        console.log(error) 
        return;
        })
      })

      
        this.showProjectDetailSection =false;


      },


  getProjectImage(event)
    {
    let files = event.target.files;
               if (files.length) 
                this.project_picture = files[0];

    },


  addFeature: function () {
      this.features.push({ feature: '',project_id:this.project_id });
    

    },

    saveFeatures()
    { 
    this.done = true;
    
    var data = qs.stringify(this.features);
    console.log(this.features)
     return this.axios.post('portfolio/features',qs.stringify(this.features)).then((resp)=>{
     this.showProjectFeatures =false
     this.showProjectTechs=true
  })
    },


     saveTechs(){
    
                 
     this.selectedTechs.push(this.project_id)
              
      this.axios.post('portfolio/technologies',qs.stringify(this.selectedTechs)).then((resp)=>{
      console.log(resp.data)
      this.showSuccessMessage = true
      this.showProjectTechs=false;

      }).catch((error)=>{console.log(error)})
      
      },

    fetchTechnologies()
    {
    return this.axios.get('technologies').then((res)=>{
    this.technologies=res.data;
    })
    },

      addToTechnologies()
    {
        /*this.selectedTechnologies.push({project_id:this.project_id,technology_id:this.selectedTechs}); */
       

        /*var obj = this.selectedTechs.reduce(function(result,item, index, arry)
        {
        result["technology_id"]=item
        result["project_id"]=25

        return result
        },{})*/

       

    },   

    addMoreProjects()
    {
this.showProjectDetailSection=true;
    },

    viewPortfolio()
    {
      this.$router.push({name: 'portfolio'})

    },

  /*toObject(arr) {
  var rv = {project_id:this.project_id};
  for (var i = 0; i < arr.length; ++i)

    rv[i] = arr[i];
    
  return rv;

}*/

    
  }
}

</script>