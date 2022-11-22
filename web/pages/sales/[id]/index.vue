<template>
  <AppPageBar back :back-to="pageRoutes.sales.to">
    <template v-slot:title> {{ data.title }} </template>
  </AppPageBar>
  <v-container>
    <v-row>
      <v-col lg="9" class="px-0">
        <v-row>
          <v-col cols="12" class="pb-0">
            <div class="px-3">
              <CoinsOutInformation :data="data" />
            </div>
            <v-divider></v-divider>
          </v-col>

          <v-col cols="12" class="py-0">
            <CoinsOutSalesTable v-model="shareholderSales" :data="data" />
          </v-col>
        </v-row>
      </v-col>
      <v-col lg="3">
        <CoinsOutSummary :data="data" :shareholder-sales="shareholderSales" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup lang="ts">
import { computed, reactive } from "vue";
import { CoinsOut, ShareholderSale } from "~~/types/CoinsOut";
import CoinsOutInformation from "@/components/pages/sales/view/CoinsOutIInformation.vue";
import CoinsOutSalesTable from "@/components/pages/sales/view/CoinsOutSalesTable.vue";
import CoinsOutSummary from "~~/components/pages/sales/view/CoinsOutSummary.vue";
import { pageRoutes } from "~~/configs/page-routes";

const data = reactive<CoinsOut>({
  id: 2,
  shop_id: 1,
  saving_fund_id: 2,
  electricity_charge_id: 1,
  title: "November 23 to December 5 Coins Out Sales",
  description: "Hello this is description",
  start_date: "11/23/2022",
  end_date: "12/5/2022",
  status: "ongoing",

  computation: null,

  shareholders: [
    {
      id: 1,
      username: "topzdev",
      firstname: "Christopher",
      lastname: "Lugod",
      initials: "CL",
      color: "green",
      percentage: 25,
    },
    {
      id: 2,
      username: "christian",
      firstname: "Christian",
      lastname: "Lugod",
      initials: "CL",
      color: "red",
      percentage: 25,
    },
    {
      id: 3,
      username: "christian",
      firstname: "Sebastian",
      lastname: "Lugod",
      initials: "SL",
      color: "purple",
      percentage: 25,
    },
    {
      id: 4,
      username: "christian",
      firstname: "Angelo",
      lastname: "Lugod",
      initials: "AL",
      color: "blue",
      percentage: 25,
    },
  ],

  electricity_charge: {
    start_date: "11/13/2022",
    end_date: "11/13/2022",
    kwh: 329,
    kwh_charge: 10.33,
  },

  saving_fund: {
    description: "",
    created_date: "11/13/2022",
    percentage: 10,
  },
});

const shareholderSales = reactive<ShareholderSale[]>(
  data.shareholders.map((item) => {
    return {
      text: `${item.firstname} ${item.lastname}`,
      ...item,
      sales: 0,
      electricity: 0,
      savingFunds: 0,
      totalDeductions: 0,
      totalPayout: 0,
    };
  })
);
</script>

<style></style>
