import axios from "axios"
import { mapGetters } from 'vuex';

    export default {
        name : 'HomePage',
        data() {
            return {
                postLists : [],
                categoryLists : [],
                searchKey : "",
                tokenStatus : false
            }
        },
        computed: {
            ...mapGetters(['getToken','getUserData']),
        },
        methods: {
            getAllPost() {
                axios.get('http://localhost:8000/api/allpost').then(res=>{
                    for (let i = 0; i < res.data.length; i++) {
                        res.data[i].image = "http://localhost:8000/post/"+ res.data[i].image              
                    }
                    this.postLists = (res.data)     
                })           
            },
            loadCategory(){
                axios.get('http://localhost:8000/api/allcategory').then(res=>{
                    this.categoryLists = (res.data)
                })
            },
            search(){
                let search = {
                    key : this.searchKey,
                }
                axios.post('http://localhost:8000/api/post/search',search).then(res=>{
                    for (let i = 0; i < res.data.length; i++) {
                        res.data[i].image = "http://localhost:8000/post/"+ res.data[i].image              
                    }
                    this.postLists = (res.data)  
                })
            },
            categorySearch(searchKey){
                let search = {
                    key : searchKey,
                }
                axios.post('http://localhost:8000/api/category/search',search).then(res=>{
                    for (let i = 0; i < res.data.length; i++) {
                        res.data[i].image = "http://localhost:8000/post/"+ res.data[i].image              
                    }
                    this.postLists = (res.data)  
                }).catch(err=>{
                    console.log(err)
                })
            },
            detail(id){
                this.$router.push({
                    name : 'NewDetail',
                    params:{
                        newId : id
                    }
                })
            },
            home(){
                this.$router.push({
                    name : 'home'
                })
            },
            login(){
                this.$router.push({
                    name : 'LoginPage'
                })
            },
            checkToken(){
                if (this.getToken != null && this.getToken != undefined && this.getToken !== "") {
                    this.tokenStatus = true;
                } else {
                    this.tokenStatus = false;
                }
            },
            logout(){
                this.$store.dispatch('setToken',null);
                this.login(); 
            }
        },
        mounted () {
            this.checkToken();
            // console.log('token : ',this.getToken);
             this.getAllPost();
             this.loadCategory();
        },
    }
