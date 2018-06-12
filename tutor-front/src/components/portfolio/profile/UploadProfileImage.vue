<template>
<div>
<!--<input type="text" v-model="user.user_id" class="form-control">-->
<input type="file" @change="getUploadedImage" class="form-control">
<button class="btn btn-success" @click="uploadImage">Upload Image</button>
</div>
</template>
<script>
export default
{
	data()
	{
	return
	{
selectedFile:null;
preview_image:null;
user:{}
	}
	},
	methods:
	{
	getUploadedImage(event)
	{
	this.selectedFile = event.target.files[0];

	},

	uploadImage()
	{
	const fd = new FormData();
	fd.append('avatar',this.selectedFile,this.selectedFile.name)
	//fd.append('user_id',this.user.user_id)
	/*return this.axios.post('avatar',fd,
	{onUploadProgress:uploadEvent=>{console.log('upload progress:'+Math.round(uploadEvent.loaded/uploadEvent.total*100)+'%')}}).then((resp)=>
	{

	})*/

	return this.axios.post('avatar',fd).then((response)=>
	{
	console.log('Success!')
	})
	}

	}
}
</script>
<style>
</style>