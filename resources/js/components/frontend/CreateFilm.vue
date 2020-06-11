<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-2">
        <div class="card">
          <div class="card-body">
            <form class="form">
              <div class="row">
                <div class="col-lg-5">
                  <div class="form-group">
                    <label for>Name</label>
                    <input class="form-control" v-model="formData.name" />
                    <div v-if="errors.name" class="text-danger">{{ errors.name[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Release</label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="release"
                        v-model="formData.release"
                        id="release"
                        value="1"
                        checked
                      />
                      <label class="form-check-label" for="exampleRadios1">Yes</label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="release"
                        v-model="formData.release"
                        id="release"
                        value="2"
                      />
                      <label class="form-check-label" for="exampleRadios2">No</label>
                    </div>

                    <div v-if="errors.release" class="text-danger">{{ errors.release[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Date</label>
                    <!-- <input class="form-control" v-model="formData.date" /> -->
                    <datetime
                      v-model="formData.date"
                      :format="'y-MM-dd'"
                      :input-class="'form-control'"
                      placeholder="Select Date"
                    ></datetime>
                    <div v-if="errors.date" class="text-danger">{{ errors.date[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Ratings</label>

                    <input
                      type="range"
                      min="1"
                      max="5"
                      v-model="formData.rating"
                      class="slider"
                      id="myRange"
                    />
                    <span>{{formData.rating}}</span>
                    <div v-if="errors.rating" class="text-danger">{{ errors.rating[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Ticket</label>
                    <input
                      style="width:100%"
                      type="number"
                      min="1"
                      class="form-control"
                      v-model="formData.ticket"
                    />
                    <div v-if="errors.ticket" class="text-danger">{{ errors.ticket[0] }}</div>
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group">
                    <label for>Price</label>
                    <input class="form-control" v-model="formData.price" />
                    <div v-if="errors.price" class="text-danger">{{ errors.price[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Country</label>
                    <v-select
                      :options="countries"
                      :reduce="country_name => country_name.id"
                      label="name"
                      v-model="formData.country_name"
                      placeholder="Select a country"
                    ></v-select>
                    <div v-if="errors.country_name" class="text-danger">{{ errors.country_name[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label class>Genre</label>
                    <v-select
                      :options="genres"
                      :reduce="genre_name => genre_name.id"
                      label="name"
                      v-model="formData.genre_name"
                      placeholder="Select a genre"
                      multiple
                    ></v-select>
                    <div v-if="errors.genre_name" class="text-danger">{{ errors.genre_name[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Photo</label>
                    <input type="file" v-on:change="onImageChange" class="form-control" />
                    <div class="col-md-3" v-if="image">
                      <img :src="image" class="img-responsive" height="70" width="90" />
                    </div>
                    <div v-if="errors.file" class="text-danger">{{ errors.file[0] }}</div>
                  </div>
                  <div class="form-group">
                    <label for>Description</label>
                    <textarea
                      v-model="formData.description"
                      class="form-control"
                      id
                      cols="30"
                      rows="3"
                    ></textarea>
                    <div v-if="errors.description" class="text-danger">{{ errors.description[0] }}</div>
                  </div>
                </div>
                <div class="col-md-8 offset-2">
                  <button
                    @click.prevent="createFilm"
                    class="form control btn btn-md btn-primary float-right"
                  >Create New Film</button>
                </div>
              </div>
            </form>
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
      formData: {},
      url: window.location.origin,
      countries: [],
      genres: [],
      image: "",
      imageData: new FormData(),
      errors: []
    };
  },
  created() {
    this.getCountry();
    this.getGenre();
  },
  methods: {
    getCountry() {
      axios.get(this.url + "/api/country").then(res => {
        this.countries = res.data;
      });
    },

    getGenre() {
      axios.get(this.url + "/api/genre").then(res => {
        this.genres = res.data;
      });
    },
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      var images = this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
      this.imageData.append("file", file);
    },
    createFilm() {
      axios.defaults.withCredentials = true;
      let data = this.formData;

      axios.get(this.url + "/sanctum/csrf-cookie").then(response => {
        this.imageData.set("data", JSON.stringify(this.formData));

        axios
          .post(this.url + "/api/create-film", this.imageData)
          .then(res => {
            this.sweetAlert();
          })
          .catch(error => {
            if (error.response.status == 422) {
              this.errorMsg = "";
              this.errors = error.response.data.errors;
            } else if (error.response.status == 401) {
              this.errors = [];
              this.errorMsg = error.response.data.error;
            } else {
              alert(error);
            }
          });
      });
    },
    sweetAlert() {
      this.$swal({
        icon: "success",
        title: "Wow! Your films is created successfully!"
      }).then(res => {
        this.formData = {};
      });
    }
  }
};
</script>

<style scoped>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: 0.2s;
  transition: opacity 0.2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4caf50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4caf50;
  cursor: pointer;
}
</style>