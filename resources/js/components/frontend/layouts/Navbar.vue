<template>
  <div>
    <v-app-bar color="red lighten-2">
      <v-container>
        <v-row>
          <v-card-actions left>
            <v-btn to="/" text>
              <h3>Cinema Mates</h3>
            </v-btn>
          </v-card-actions>
          <v-spacer></v-spacer>
          <v-card-actions v-if="!isLogged" right>
            <v-btn to="/signin" text>
              <v-icon>mdi-login</v-icon>Sign In
            </v-btn>
            <v-btn to="/signup" text>
              <v-icon>mdi-send</v-icon>Sign Up
            </v-btn>
          </v-card-actions>
          <v-card-actions v-else right>
            <v-btn text>
              <v-icon>mdi-human</v-icon>
              {{ user.user.name }}
            </v-btn>
            <v-btn to="/create-film" text>
              <v-icon>mdi-post</v-icon>Create Film
            </v-btn>
            <v-btn @click="signOut" text>
              <v-icon>mdi-logout</v-icon>Sign Out
            </v-btn>
          </v-card-actions>
        </v-row>
      </v-container>
    </v-app-bar>
  </div>
</template>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      name: ""
    };
  },
  computed: {
    ...mapGetters(["isLogged", "user"])
  },

  methods: {
    signOut() {
      this.$store.dispatch("signOut");
    }
  }
};
</script>
<style scoped>
a {
  text-decoration: none;
}
</style>