// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
  app: {
    head: {
      charset: "utf-16",
      viewport: "initial-scale=1",
      title: "Pisonet Manager",
      meta: [
        // <meta name="description" content="My amazing site">
        { name: "description", content: "Manage Sales of your pisonet" },
      ],
    },
  },
  css: ["vuetify/lib/styles/main.sass", "@/assets/scss/vuetify.scss"],
  build: {
    transpile: ["vuetify"],
  },
  vite: {
    define: {
      "process.env.DEBUG": false,
    },
  },
});
