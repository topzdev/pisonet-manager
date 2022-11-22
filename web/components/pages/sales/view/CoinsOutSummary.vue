<template>
  <v-card class="pt-5" elevation="1">
    <v-card-title>
      <h2 class="text-h4 font-weight-bold mb-3">Summary</h2>
    </v-card-title>
    <v-card-text>
      <v-table>
        <tr v-for="item in summaryItems">
          <td align="left">
            <h2
              class="text-medium-emphasis font-weight-regular mb-1"
              :class="item.class"
            >
              {{ item.text }}
            </h2>
          </td>

          <td align="right">
            <h2 class="mb-1" :class="item.class">
              {{ formatMoney(item.value) }}
            </h2>
          </td>
        </tr>
      </v-table>
    </v-card-text>

    <v-card-actions>
      <v-row>
        <v-col cols="12">
          <v-btn variant="elevated" color="primary" block size="large"
            >Mark as Completed</v-btn
          >
        </v-col>
      </v-row>
    </v-card-actions>
  </v-card>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { ShareholderSale } from "~~/types/CoinsOut";

const props = defineProps({
  shareholderSales: {
    type: Array as PropType<ShareholderSale[]>,
    value: [],
  },
});

const shareholderSales = props.shareholderSales;

const summary = computed(() => {
  if (!shareholderSales || shareholderSales.length === 0) return;

  return shareholderSales.reduce(
    (acc, cur) => {
      const totalSales = acc.totalSales + cur.sales;
      const totalSavingFund = acc.totalSavingFund + cur.savingFunds;
      const totalElectricityFund = acc.totalElectricityFund + cur.electricity;
      const totalDeduction =
        acc.totalDeduction + (totalSavingFund + totalElectricityFund);
      const finalSales = totalSales - totalDeduction;

      return {
        totalSales,
        totalSavingFund,
        totalElectricityFund,
        totalDeduction,
        finalSales,
      };
    },
    {
      totalSales: 0,
      totalSavingFund: 0,
      totalElectricityFund: 0,
      totalDeduction: 0,
      finalSales: 0,
    }
  );
});

const summaryItems = computed(() => {
  if (!summary.value) return [];

  return [
    {
      text: "Sales",
      value: summary.value.totalSales,
      class: "",
    },
    {
      text: "Saving Fund",
      value: summary.value.totalSavingFund,
      class: "",
    },
    {
      text: "Electricity Fund",
      value: summary.value.totalElectricityFund,
      class: "",
    },
    {
      text: "Deduction",
      value: summary.value.totalDeduction,
      class: "",
    },
    {
      text: "Final Sales",
      value: summary.value.finalSales,
      class: "text-h5 font-weight-bold mt-2",
    },
  ];
});

const formatMoney = (value: number) => {
  return moneyFormatter().format(value);
};
</script>

<style></style>
