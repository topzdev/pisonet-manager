import { config } from "~~/configs";
import { Shareholder } from "~~/types/Shareholder";
import { useUserStore } from "./user";

export const useShareholderStore = defineStore("shareholder", {
  state: () => {
    return {
      list: null as Shareholder[] | null,

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
      if (!state.list) return null;

      const total = state.list.reduce((acc, cur) => {
        return acc + cur.percentage;
      }, 0);

      return {
        total,
        color: total === 100 ? "text-success" : "text-warning",
      };
    },
  },
});
