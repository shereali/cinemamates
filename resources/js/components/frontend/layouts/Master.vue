<template>
  <v-app
    style="
    background: #3A1C71;
    background: -webkit-linear-gradient(to right, #FFAF7B, #D76D77, #3A1C71);
    background: linear-gradient(to right, #FFAF7B, #D76D77, #3A1C71);
  "
  >
    <v-content>
      <navbar></navbar>
      <router-view :key="this.$router.fullPath"></router-view>
    </v-content>
  </v-app>
</template>