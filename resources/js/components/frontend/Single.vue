<template>
  <div class="conainer">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4 offset-2 text-right">
            <img class="img-thumbnail" width="350" :src="url+'/image/movie/'+film.photo" alt />
          </div>
          <div class="col-lg-5">
            <h1>{{ film.name }}</h1>
            <p class="text-muted">
              <v-icon>mdi-clock</v-icon>
              {{ film.year }}
            </p>
            <p>
              <v-icon>mdi-call-split</v-icon>
              <span v-for="(genre, g) in film.genres" :key="g">
                <v-icon>mdi-clip</v-icon>
                {{ genre.name?genre.name:'' }},
              </span>
            </p>
            <p>
              <v-icon>mdi-flag</v-icon>
              {{ film.country?film.country.name:''}}
            </p>
            <strong class="mt-10">Description:</strong>
            <p>{{ film.description }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-10">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 offset-2">
            <h3 class="card-title">Post Comment:</h3>
            <form action class="form">
              <div class="form-group">
                <label for>Name:</label>
                <input name="name" type="text" class="form-control" />
              </div>
              <div class="form-group">
                <label for>Comment:</label>
                <textarea name="comment" class="form-control" cols="30" rows="3"></textarea>
              </div>
              <button class="btn btn-md btn-primary">Comment</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row mt-10">
          <div class="col-lg-4 offset-2">
            <h4>
              <strong class="ml-5">Comments:</strong>
              <hr />
            </h4>
            <div v-for="(comment, index) in film.comments" :key="index">
              <ul class="list-unstyled">
                <li class="media">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">
                      <span class="text-info">{{ comment.name }}</span>
                      at
                      <small
                        class="text-muted"
                      >{{ dateFormat(comment.created_at) }}</small>
                    </h5>
                    {{ comment.comment }}
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { log } from "util";
import moment from "moment";
export default {
  data() {
    return {
      film: {},
      url: window.location.origin
    };
  },

  created() {
    axios.get(this.url + "/api/movie/" + this.$route.params.slug).then(res => {
      this.film = res.data.data;
      console.log(this.film);
    });
  },
  methods: {
    dateFormat(date) {
      return moment(date).format("MMMM Do YYYY, h:mm:ss a");
    }
  }
};
</script>