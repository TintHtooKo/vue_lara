<template>
    <div>
      <!-- Navigation Buttons -->
      <div class="d-flex justify-content-center py-3">
        <p class="btn btn-danger text-white btn-sm me-3" @click="home()">Home</p>
        <p class="btn btn-dark text-white btn-sm" @click="login()">Login</p>
      </div>
  
      <!-- Login Form -->
      <div class="container col-5 shadow p-5 my-5">
        <div class="alert alert-danger" role="alert" v-if="userStatus">This is a danger alert—check it out!</div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            v-model="userData.email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter email"
          />
        </div>
        <div class="form-group mt-3">
          <label for="exampleInputPassword1">Password</label>
          <input
            type="password"
            v-model="userData.password"
            class="form-control"
            id="exampleInputPassword1"
            placeholder="Password"
          />
        </div>
        <div class="form-check mt-3">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" @click="accountLogin">
          Submit
        </button>
        <button @click="check()">Check token </button>
      </div>
    </div>
  </template>
  
  <script>
import axios from 'axios';
import { mapGetters } from 'vuex';

  export default {
    name: "LoginPage",
    data() {
      return {
        userData: {
          email: "",
          password: "",
        },
        userStatus : false
      };
    },
    computed: {
        ...mapGetters(['getToken','getUserData']),
    },
    methods: {
      home() {
        this.$router.push({ name: "home" });
      },
      login() {
        this.$router.push({ name: "LoginPage" });
      },
      accountLogin() {
        axios.post('http://localhost:8000/api/user/login',this.userData).then(res=>{
            if(res.data.token == null){
                this.userStatus = true
            }else{
                this.userStatus = false
               this.storeUserInfo(res);
               this.home();
            }
        }).catch(err=>{
            console.log(err);
        })
      },
      storeUserInfo(res){
        this.$store.dispatch('setToken',res.data.token);
        this.$store.dispatch('setUserData',res.data.user);
      },
      check(){
        console.log(this.getToken);
        console.log(this.getUserData);
      }
    },
  };
  </script>
  