<template>
<div>

<hr>
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-title">
<h3>Send Me an Email</h3>
</div>
</div>
<div class="panel-body">


  <form v-on:submit.prevent="sendContact"> 
<div v-show="success_message" class="alert alert-success">
Message send. Thank you for contacting me, I will be in touch with you in less than 12 hours.
</div>
          <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Your Name:</label>
              <input type="text" v-model="contact.name" name="name" id="name" class="form-control" v-validate="'required|alpha_space|min:3|max:30'" placeholder="Your Name" />
              <div class="help-block alert alert-danger" v-show="errors.has('name')">
          {{errors.first('name')}}
          </div>              
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>E-Mail:</label>
              <input type="email" v-model="contact.email" name="email" id="email" class="form-control" v-validate="'required|email'" placeholder="Your E-Mail Address" />  
              <div class="help-block alert alert-danger" v-show="errors.has('email')">
          {{errors.first('email')}}
          </div>            
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Subject:</label>
              <input type="text" v-model="contact.subject" name="subject" id="subject" class="form-control"  v-validate="'required|alpha_space|min:5|max:50'"/>              
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Message:</label>
              <textarea v-model="contact.message" name="message" placeholder="Enter your Message Here" class="form-control" v-validate="'required|alpha_space|min:10'">
              </textarea>
              <div class="help-block alert alert-danger" v-show="errors.has('message')">
          {{errors.first('message')}}
          </div>
                            
            </div>
          </div>
        </div>

        <br />

        <div class="form-group">
          <button class="btn btn-info">Send </button>
        </div>

</form>
</div>
</div>
</div>
<div class="col-md-3 contacts">

<h3 class="contact-title">Contacts</h3>
<table class="table table-striped">
<tr><th>Call me @ <span class="fa fa-phone">+254717245218</span></th></tr>
<tr><th>Follow Me:</th></tr>
<tr><th>Github<span class="fa fa-phone">Wafutech</span></th></tr>
<tr><th>Facebook @ <span class="fa fa-phone">Ronald Wafula</span></th></tr>
<tr><th>Twitter @ <span class="fa fa-phone">Wafutech</span></th></tr>
</table>
</div>
</div>


</div>
</template>
<script>
export default
{
	 data(){
        return{
          
          contact:{},
          success_message:false
        }
        },
    
  methods:
  {
  sendContact()
  {
   
        return this.axios.post('contact', this.contact).then((response) => {
          
          console.log(this.response.data);
          this.success_message=true;
          

        }).catch((error)=>{console.log(error)})
  }

  }
}
</script>
<style>
.contact-title
{
  padding-top:20px;
  color:brown;
  font-size:16;

}

.contacts
{
  border-left:2px solid lightblue;
  padding:25px;
  position:relative;
  left:20px;
  right:0px;
}
</style>