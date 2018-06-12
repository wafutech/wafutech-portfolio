<template>
<div>
<h2>List Blog Posts</h2>
<div v-for="post in posts">
<hr>
<div class="jumbotron">
<router-link :to="{name: 'post', params: { id: post.id }}">

<h5>{{post.post_title}}</h5>
</router-link>
<h5 v-if="post.excerpt"><small>{{post.excerpt}}</small></h5>
</div>

<hr/>
</div>
</div>
</template>
<script>
 export default {
 name:'BlogPosts',
        data(){
            return{
                posts: []
               
            }
        },

        created: function()
        {
            this.fetchPosts();
        },

        methods: {
            fetchPosts()
            {
              
             return this.axios.get('blog/posts').then((response) => {
                  this.posts = response.data;
                  console.log(response.data)
              });
            },
            

            deleteCategory(id)
            {
            
              let uri = 'http://127.0.0.1:8000/api/asset/categories/${id}';
             this.categories.splice(id, 1);
              this.axios.delete(uri).then((response)=>
              {
                  this.message=response.data;              this.submitted = true;
             
              });
                           }
        }
    }

</script>