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
  </v-app>
</template>

<script setup>
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
