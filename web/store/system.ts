import { SnackbarConfig } from "~~/types/System";

const defaultSnackbar: SnackbarConfig = {
  show: false,
  message: "",
  color: "",
  timeout: -1,
};

export const useSystemStore = defineStore("system", {
  state: () => {
    return {
      snackbar: defaultSnackbar,
    };
  },

  actions: {
    async showSnackbar(config: SnackbarConfig) {
      this.snackbar = config;
    },

    async resetSnackbar() {
      this.snackbar = defaultSnackbar;
    },
  },
});
