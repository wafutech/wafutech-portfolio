<template>
    <div>
        <h3 class="title">Technologies</h3>
               <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create-asset-category'}" class="btn btn-success">Add Technology</router-link>
          </div>
        </div><br />
        
        <ul>
        <li v-for="tech in technologies">{{tech.technology}}<span v-on:click="deleteTechnology(category.id)">X</span></li>
        </ul>
    </div>
</template>


<script>

    export default {
      name:'ListTechnologies',

        data(){
            return{
                technologies: []
               
            }
        },

        created: function()
        {
            this.fetchTechnologies();
        },

        methods: {
            fetchTechnologies()
            {
             var baseURL = this.baseURL;
              let uri = baseURL+'technologies';
              this.axios.get(uri).then((response) => {
                  this.technologies = response.data;
              });
            },
            

            deleteTechnology(id)
            {
                         var baseURL = this.baseURL;

              let uri = baseURL+'technologies/${id}';

             this.technologies.splice(id, 1);
              this.axios.delete(uri).then((response)=>
              {
                  this.message=response.data;              this.submitted = true;
             
              });
                           }
        }
    }
</script>