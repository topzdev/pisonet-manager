<template>
  <div>
    <v-toolbar border color="transparent">
      <v-toolbar-title>Sales</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn color="primary">Add Coins Out</v-btn>
    </v-toolbar>
    <v-container fluid>
      <v-card flat width="600" class="mx-auto">
        <v-row>
          <v-col> </v-col>
        </v-row>
      </v-card>
    </v-container>
  </div>
</template>

<script setup lang="ts">
type Shareholder = {
  username: string;
  firstname: string;
  lastname: string;
  initials: string;
  color: string;
  percentage: number;
};

type ElectricityCharge = {
  start_date: string;
  end_date: string;
  kwh: number;
  kwh_charge: number;
};

type SavingFund = {
  description: string;
  created_date: string;
  percentage: number;
};

type CoinsOutSale = {
  shareholder: 1;
  shareholder_percentage: 1;
  amount: number;
};

type CoinsOut = {
  id: number;
  shop_id: number;
  saving_fund_id: number;
  electricity_charge_id: number;
  title: string;
  description: string;
  start_date: string;
  end_date: string;
  status: string;
  shareholders?: Shareholder[];
  electricity_charge?: ElectricityCharge;
  saving_fund?: SavingFund;
  sales?: CoinsOutSale[];
};

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

    shareholders: [
      {
        username: "topzdev",
        firstname: "Christopher",
        lastname: "Lugod",
        initials: "CL",
        color: "green",
        percentage: 60,
      },
      {
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
    status: "pending",
    shareholders: [
      {
        username: "topzdev",
        firstname: "Christopher",
        lastname: "Lugod",
        initials: "CL",
        color: "green",
        percentage: 60,
      },
      {
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
]);

definePageMeta({
  layout: "admin",
});
</script>

<style></style>
