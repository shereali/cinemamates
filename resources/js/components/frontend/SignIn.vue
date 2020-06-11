<template>
  <div class="container">
    <div class="row mt-10">
      <div class="col-lg-4 offset-4">
        <div class="card">
          <div class="card-body">
            <div v-if="errors.message" class="alert alert-danger">{{ errors.message[0] }}</div>
            <form class="form" id="signin" @submit.prevent="signIn">
              <div class="form-group">
                <label for>Email</label>
                <input v-model="email" type="email" class="form-control" autofocus />
              </div>
              <div class="form-group">
                <label for>Password</label>
                <input v-model="password" type="password" class="form-control" />
              </div>
              <button type="submit" class="form control btn btn-md btn-primary">Sign In</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { log } from "util";
export default {
  data() {
    return {
      url: window.location.origin,
      email: "",
      password: "",
      errorMsg: "",
      errors: ""
    };
  },

  methods: {
    signIn() {
      this.$store
        .dispatch("signIn", {
          email: this.email,
          password: this.password
        })
        .then(() => {
          this.$router.push({ name: "Home" });
        })
        .catch(error => {
          if (error.response.status == 404) {
            this.errorMsg = "";
            this.errors = error.response.data;
            console.log(this.errors);
          } else if (error.response.status == 401) {
            this.errors = [];
            this.errorMsg = error.response.data;
          } else {
            alert(error);
          }
        });
    }
  }
};
</script>