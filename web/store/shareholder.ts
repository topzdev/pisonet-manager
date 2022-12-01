import { config } from "~~/configs";
import { Shareholder } from "~~/types/CoinsOut";

export const useShareholderStore = defineStore("shareholder", {
  state: () => {
    return {
      list: [] as Shareholder[],

      create: {
        share: 0,
        firstname: "",
        lastname: "",
        email: "",
        password: "",
        confirmPassword: "",
      },

      maxShare: config.maxShareholderShares,
    };
  },

  getters: {
    shareInfo: (state) => {
      const total = state.list.reduce((acc, cur) => {
        return acc + cur.percentage;
      }, 0);

      return {
        total,
        color: total === 100 ? "text-success" : "text-warning",
      };
    },
  },

  actions: {
    async getShareholder() {
      const { $api } = useNuxtApp();
      const { data } = await $api.shareholder.getAll();

      if (data.value) {
        this.list = data.value;
      }
    },
  },
});
