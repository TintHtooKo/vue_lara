export default {
    name: "LoginPage",
    data() {
      return {
        userData: {
          email: "",
          password: "",
        },
      };
    },
    methods: {
      home() {
        this.$router.push({ name: "home" });
      },
      login() {
        this.$router.push({ name: "LoginPage" });
      },
      accountLogin() {
        console.log(this.userData);
      },
    },
  };