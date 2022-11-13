<template>
  <v-app-bar :elevation="2" color="primary">
    <v-app-bar-nav-icon @click="$emit('toggleDrawer')" />
    <v-app-bar-title>{{ title }}</v-app-bar-title>
    <v-spacer></v-spacer>

    <v-btn icon @click="$emit('changeTheme')">
      <v-icon>
        {{
          theme === "light" ? "mdi-weather-sunny" : "mdi-weather-night"
        }}</v-icon
      >
    </v-btn>

    <!-- <v-menu min-width="200px" rounded>
      <template v-slot:activator="{ props }">
       
      </template>
      <v-card>
        <v-card-text>
          <div class="mx-auto text-center">
            <v-avatar color="brown">
              <span class="text-h5">{{ user.initials }}</span>
            </v-avatar>
            <h3>{{ user.fullName }}</h3>
            <p class="text-caption mt-1">
              {{ user.email }}
            </p>
            <v-btn rounded variant="text"> Edit Account </v-btn>
            <v-btn rounded variant="text"> Disconnect </v-btn>
          </div>
        </v-card-text>
      </v-card>
    </v-menu> -->
    <v-btn icon>
      <v-avatar color="brown">
        <span class="text-h6">{{ user.initials }}</span>
      </v-avatar>
    </v-btn>
  </v-app-bar>
</template>

<script setup lang="ts">
const title = ref("Pisonet Manager");
const user = reactive({
  fullName: "Christian Lugod",
  initials: "CL",
  email: "christianlugod05@gmail.com",
});

defineProps(["theme"]);
</script>
