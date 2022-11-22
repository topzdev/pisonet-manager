<template>
  <AppPageBar back>
    <template v-slot:title> Sales </template>

    <template v-slot:button>
      <v-btn color="primary" @click="modals.createCoinsOut = true">
        Add Coins Out
      </v-btn>
    </template>
  </AppPageBar>

  <v-container fluid>
    <v-row>
      <v-col cols="8" class="mx-auto">
        <v-row>
          <v-col cols="12" v-for="item in coinsOut" :key="item.id">
            <CoinsOutCard :coins-out="item" />
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
  <CreateCoinsOutModal v-model="modals.createCoinsOut" />
</template>

<script setup lang="ts">
import { CoinsOut } from "~~/types/CoinsOut";
import CreateCoinsOutModal from "@/components/dialogs/CoinsOut/Main.vue";
import { pageRoutes } from "~~/configs/page-routes";
import CoinsOutCard from "~~/components/pages/sales/cards/CoinsOutCard.vue";

const modals = reactive({
  createCoinsOut: false,
});

const coinsOut = reactive<CoinsOut[]>([
  {
    id: 1,
    shop_id: 1,
    saving_fund_id: 1,
    electricity_charge_id: 1,
    title: "November 6 to November 13 Coins Out Sales",
    description: "Hello this is description",
    start_date: "11/13/2022",
    end_date: "11/13/2022",
    status: "completed",
    sales: null,

    computation: {
      saving_funds: 520,
      total_sales: 5225,
      total_deduction: 1102,
      final_sales: 3552,
    },

    shareholders: [
      {
        id: 1,
        username: "topzdev",
        firstname: "Christopher",
        lastname: "Lugod",
        initials: "CL",
        color: "green",
        percentage: 60,
      },
      {
        id: 2,
        username: "christian",
        firstname: "Christian",
        lastname: "Lugod",
        initials: "CL",
        color: "red",
        percentage: 60,
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
  },
  {
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
  },
]);

definePageMeta({
  layout: "admin",
});
</script>

<style></style>
