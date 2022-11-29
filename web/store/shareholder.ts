import { config } from "~~/configs";
import { Shareholder } from "~~/types/CoinsOut";

export const useShareholderStore = defineStore("shareholder", {
  state: () => {
    return {
      list: [
        {
          id: 1,
          username: "topzdev",
          firstname: "Christopher",
          lastname: "Lugod",
          initials: "CL",
          color: "green",
          percentage: 15,
          email: "christianlugod05@gmail.com",
          is_admin: true,
        },
        {
          id: 2,
          username: "christian",
          firstname: "Christian",
          lastname: "Lugod",
          initials: "CL",
          color: "red",
          percentage: 25,

          email: "christianlugod05@gmail.com",
          is_admin: false,
        },
        {
          id: 3,
          username: "christian",
          firstname: "Charity",
          lastname: "Lugod",
          initials: "SL",
          color: "purple",
          percentage: 25,
          email: "christianlugod05@gmail.com",
          is_admin: false,
        },
        {
          id: 4,
          username: "christian",
          firstname: "Cedric",
          lastname: "Lugod",
          initials: "AL",
          color: "blue",
          percentage: 25,
          email: "christianlugod05@gmail.com",
          is_admin: false,
        },
      ] as Shareholder[],

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
});
