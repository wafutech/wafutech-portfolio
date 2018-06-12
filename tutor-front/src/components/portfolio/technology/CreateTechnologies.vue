<template>
  <div>
    <h3 class="title">Add Technology</h3>
    <div class="alert alert-success" v-show="success">
    Technology Saved...
    </div>
    <form v-on:submit.prevent="addTechnology">            
                    

           <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Technology:</label>
              <input type="text" name="technology" class="form-control" v-model="tech.technology" v-validate="'required'"/>
              <div class="help-block alert alert-danger" v-show="errors.has('technology')">
          {{errors.first('technology')}}
          </div>
              
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
import axios from 'axios';

  export default {

    data(){
        return{
          
          tech:{},
          success:false
        }
    },

    created: function()
        {
           
        },
    methods: {
         
    
      addTechnology(){
     
        return this.axios.post('technologies', this.tech).then((response) => {
        this.success=true;
   
 //setTimeout(this.success=true,3000); 

          

        })
    }
  }
}
</script>