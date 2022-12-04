<script setup>
import SystemSnackbar from "~~/components/systems/SystemSnackbar.vue";

const config = reactive({
  theme: "light",
  drawer: true,
});

function changeTheme() {
  config.theme = config.theme === "light" ? "dark" : "light";
}

function toggleDrawer() {
  config.drawer = !config.drawer;
}
</script>

<style></style>

<template>
  <v-app :theme="config.theme">
    <AppBar
      :theme="config.theme"
      @change-theme="changeTheme"
      @toggle-drawer="toggleDrawer"
    />
    <AppDrawer v-model="config.drawer" />
    <v-main>
      <slot />
    </v-main>

    <SystemSnackbar />
  </v-app>
</template>
