<template>
  <div>

 <p><router-link :to="{ name: 'profile-image' }" class="btn btn-success">Upload Profile Photo</router-link></p>
    <form v-on:submit.prevent="addPortfolio">   


                

           <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Official Name:</label>
              <input type="text" class="form-control" v-model="portfolio.portfolio_name" name="portfolio_name" v-validate="'required|max:255'"/>  
              <div class="help-block alert alert-danger" v-show="errors.has('portfolio_name')">
          {{errors.first('portfolio_name')}}
          </div>            
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Nickname:</label>
              <input type="text"  name="nickname" v-validate="'max:20'" class="form-control" v-model="portfolio.nickname" />    
              <div class="help-block alert alert-danger" v-show="errors.has('nickname')">
          {{errors.first('nickname')}}
          </div>          
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Title:</label>
              <input type="text" class="form-control" v-model="portfolio.title" name="title" v-validate="'required|max:30'"/> 
              <div class="help-block alert alert-danger" v-show="errors.has('title')">
          {{errors.first('title')}}
          </div>
              <div class="helper-block">
              Such as: Web Developer, Full-Stack Developer, Front-End Developer, Back-End Developer, Web Designer....
              </div>             
            </div>
          </div>
        </div>

                

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Phone Number:</label>
              <input type="text" class="form-control" v-model="portfolio.phone" name="phone" v-validate="'required|numeric|min:10'" />  

              <div class="help-block alert alert-danger" v-show="errors.has('phone')">
          {{errors.first('phone')}}
          </div>            
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Bio:</label>
               

              <textarea v-model="portfolio.bio"  name="bio" class="form-control" v-validate="'required|min:20'" > </textarea>   
              <div class="help-block alert alert-danger" v-show="errors.has('bio')">
          {{errors.first('bio')}}
          </div>      
            </div>
          </div>
        </div>


       

        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label>Hobies:</label>               

              <textarea v-model="portfolio.hobies"  name="hobies" class="form-control"> </textarea>         
            </div>
          </div>
        </div>

        
                                
          
        <br />

        <div class="form-group">
          <button class="btn btn-info">Save & Continue </button>
        </div>
    </form>
  </div>
</template>
<script>

  export default {
    name:'CreateProfile',


    data(){
        return{
          
          portfolio:{
          },
          skills:[]
        }
    },

    created: function()
        {
           
        },
    methods: {
         
    
  addPortfolio(){
      this.$validator.validateAll().then(()=>
      {
     
   return this.axios.post('profile',this.portfolio).then((response) => {
          console.log(response.data);
    this.add_projects = true;
this.show_profile_form = false;
          

        }) 
      })
     
         

        
    },
    addSkill()
    {
     /*e.preventDefault();
  var inputEl = '<input v-model="skills" type="text">';
  $('#skills').append(inputEl);*/

   this.skills.push({ value: '' });
   this.portfolio.push(this.skills);
   console.log(this.portfolio);

    }
  }
}
</script>