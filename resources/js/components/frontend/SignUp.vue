<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-4">
          <div class="card">
            <div class="card-body">
              <form class="form">
                <div class="form-group">
                  <label for>Name</label>
                  <input
                    name="name"
                    v-model="formData.name"
                    type="text"
                    class="form-control"
                    required
                  />
                  <div v-if="errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div class="form-group">
                  <label for>Email</label>
                  <input
                    name="email"
                    v-model="formData.email"
                    type="text"
                    class="form-control"
                    required
                  />
                  <div v-if="errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div>
                <div class="form-group">
                  <label for>Password</label>
                  <input
                    name="password"
                    v-model="formData.password"
                    type="password"
                    class="form-control"
                    required
                  />
                  <div v-if="errors.password" class="text-danger">{{ errors.password[0] }}</div>
                </div>
                <div class="form-group">
                  <label for>Confirm Password</label>
                  <input
                    type="password"
                    name="password_confirmation"
                    v-model="formData.password_confirmation"
                    class="form-control"
                    required
                  />
                </div>
              </form>
            </div>
            <div class="card-footer">
              <button class="btn btn-md btn-primary" @click="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      formData: {
        name: "",
        email: "",
        password: "",
        configm_password: ""
      },
      url: window.location.origin,
      error_name: "",
      error_email: "",
      error_pass: "",
      errors: [],
      errorMsg: ""
    };
  },
  methods: {
    signUp() {
      axios.defaults.withCredentials = true;
      let data = this.formData;

      axios
        .post(this.url + "/api/signup", data)
        .then(res => {
          console.log(res.data);
          this.sweetAlert(res.data.status, res.data.message);
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errorMsg = "";
            this.errors = error.response.data.errors;
          } else if (error.response.status == 401) {
            this.errors = [];
            this.errorMsg = error.response.data.errors;
          } else {
            alert(error);
          }
        });
    },

    sweetAlert(icon, title) {
      this.$swal({
        icon: icon,
        title: title
      }).then(res => {
        if (icon == "success") {
          window.location.href = this.url + "/signin";
        }
      });
    }
  }
};
</script>