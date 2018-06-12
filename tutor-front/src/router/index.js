import Vue from 'vue'
import Router from 'vue-router'
// import HelloWorld from '@/components/HelloWorld'
import axios from 'axios'
import App from '@/App.vue'
import CreateProfile from '@/components/portfolio/profile/CreateProfile.vue'
import CreateProject from '@/components/portfolio/projects/CreateProject.vue'
import Register from '@/components/auth/Register.vue'
import Login from '@/components/auth/Login.vue'
import ListSkills from '@/components/portfolio/technology/ListSkills.vue'
// import CreateSkills from '@/components/portfolio/technology/CreateSkills.vue'
import CreateTechnologies from '@/components/portfolio/technology/CreateTechnologies.vue'
import ListTechnologies from '@/components/portfolio/technology/ListTechnologies.vue'
import Profile from '@/components/portfolio/Profile.vue'
import EditProfile from '@/components/portfolio/profile/EditProfile.vue'
import Portfolio from '@/components/portfolio/Portfolio.vue'
import router from '@/router'
import Footer from '@/components/Footer.vue'
import Navbar from '@/components/Navbar.vue'
import ContactForm from '@/components/portfolio/contact/ContactForm.vue'
import Admin from '@/components/admin/Admin.vue'
import ListProjects from '@/components/portfolio/projects/ListProjects.vue'
import EditProjects from '@/components/portfolio/projects/EditProjects.vue'
import ListProfile from '@/components/portfolio/profile/ListProfile.vue'
import UploadProfileImage from '@/components/portfolio/profile/UploadProfileImage.vue'
import Comments from '@/components/wafutechblog/front/Comments.vue'
import CreateBlogPost from '@/components/wafutechblog/admin/CreateBlogPost.vue'
import CreatePostCategory from '@/components/wafutechblog/admin/CreatePostCategory.vue'
import BlogPost from '@/components/wafutechblog/front/BlogPost.vue'
import BlogPosts from '@/components/wafutechblog/front/BlogPosts.vue'
import Blog from '@/components/wafutechblog/admin/Blog.vue'
import About from '@/components/portfolio/About.vue'





Vue.use(Router)

export default new Router({
	mode:'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Portfolio
    },

    {
      path: '/aboutme',
      name: 'about',
      component: About
    },

    {
      path: '/portfolio',
      name: 'portfolio',
      component: Portfolio
    },

    {
      path: '/profile',
      name: 'create-profile',
      component: CreateProfile
    },
     {
      path: '/edit-profile',
      name: 'edit-profile',
      component: EditProfile
    },

    {
      path: '/profile/image',
      name: 'profile-image',
      component: UploadProfileImage
    },
    {
      path: '/show-profile',
      name: 'show-profile',
      component: Profile
    },
    {
      path: '/create-technology',
      name: 'create-technology',
      component: CreateTechnologies
    },

    {
      path: '/technologies',
      name: 'list-technologies',
      component: ListTechnologies
    },

    {
      path: '/skills',
      name: 'list-skills',
      component: ListSkills
    },

    {
      path: '/create-project',
      name: 'create-project',
      component: CreateProject
    },

     {
      path: '/edit-project',
      name: 'edit-project',
      component: EditProjects
    },

    { path: '/register',
      name: 'register',
      component: Register
    },

    { path: '/login',
      name: 'login',
      component: Login
    },

    { path: '/contact-me',
      name: 'contact',
      component: ContactForm
    },

    { path: '/admin',
      name: 'admin',
      component: Admin,
      meta: {
            auth: true
        }
    },
    /**
  BLOG
    */

     { path: '/admin/blog',
      name: 'admin-blog',
      component: Admin
    },

     { path: '/blog/post',
      name: 'post',
      component: BlogPost
    },

     { path: '/blog',
      name: 'blog',
      component: BlogPosts
    },
    

     { path: '/admin/blog/create-post',
      name: 'create-post',
      component: CreateBlogPost
    },
     { path: '/admin/blog/create-category',
      name: 'create-category',
      component: CreatePostCategory
    },

  ]
})

Vue.router = router
Vue.axios = axios
App.router = Vue.router
Vue.use(require('@websanova/vue-auth'),
{
  auth:require('@websanova/vue-auth/drivers/auth/bearer.js'),
  http:require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
  router:require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});
