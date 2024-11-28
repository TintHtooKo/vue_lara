import axios from "axios"
import { mapGetters } from "vuex"

export default {
    name: "NewDetail",
    data() {
        return {
            postId: 0,
            posts : {},
            tokenStatus : false,
            viewCount : 0
        }
    },
    computed: {
        ...mapGetters(['getToken','getUserData']),
    },
    methods: {
        loadPost(id) {
            let post = {
                postId : id,
            }
            axios.post('http://localhost:8000/api/post/detail',post).then(res=>{
                    res.data.image = "http://localhost:8000/post/"+ res.data.image              
                
                this.posts = (res.data)  
            }).catch(err=>{
                console.log(err)
            })
           
        },
        back(){
            history.back()
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
        let data = {
            user_id  : this.getUserData.id,
            post_id : this.$route.params.newId
        }
        axios.post('http://localhost:8000/api/post/actionlog',data).then(res=>{
            this.viewCount=res.data.data.length;
        })
        this.checkToken();
        this.postId = this.$route.params.newId
        this.loadPost(this.postId)
    },
}