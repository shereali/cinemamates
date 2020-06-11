<template>
  <div>
    <div class="container" center>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12" v-for="(film, index) in films.data" :key="index">
          <div class="card text-white bg-transparent mb-3 ml-55" style="max-width: 18rem;">
            <router-link :to="'/movie/'+film.slug.replace(/_/g,'-')">
              <div class="card-body text-center">
                <img :src="'image/movie/'+film.photo" style="width:100%;height:350px" alt />
              </div>
            </router-link>
            <div class="card-footer">
              <div class="card-title">
                <v-btn :to="'/movie/'+film.slug.replace(/_/g,'-')" text>
                  <v-icon>mdi-film</v-icon>
                  {{ film.name }}
                  <span>
                    <v-icon>mdi-comment</v-icon>
                    {{ film.comments?film.comments.length:''}}
                  </span>
                </v-btn>
                <v-btn text>
                  <v-icon>mdi-clock</v-icon>
                  {{ film.year }}
                </v-btn>
                <v-btn text>
                  <v-icon>mdi-flag</v-icon>
                  {{ film.country.name }}
                </v-btn>
                <v-btn text>
                  <span v-for="(genre, i) in film.genres" :key="i">
                    <v-icon>mdi-clip</v-icon>
                    {{ genre.name }}
                  </span>
                </v-btn>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-10">
        <div class="col-6 offset-5">
          <pagination :data="films" @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: ["film"],
  data() {
    return {
      films: {},
      hello: "it is working",
      url: window.location.origin
    };
  },
  created() {
    axios.get(this.url + "/api/films").then(res => {});
  },
  mounted() {
    console.log("Hello mounsted");
    this.getResults();
  },
  methods: {
    getResults(page = 1) {
      axios.get(this.url + "/api/films?page=" + page).then(response => {
        this.films = response.data;
      });
    }
  }
};
</script>

<style scoped>
a {
  text-decoration: none;
}
</style>