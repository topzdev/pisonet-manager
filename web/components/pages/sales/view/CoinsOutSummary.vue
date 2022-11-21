<template>
  <v-card class="py-5" elevation="1">
    <v-card-title>
      <h2 class="text-h5 font-weight-bold mb-5">Summary</h2>
    </v-card-title>
    <v-card-text>
      <v-table>
        <tr v-for="item in summaryItems">
          <td align="left">
            <h3 class="text-medium-emphasis mb-1" :class="item.class">
              {{ item.text }}
            </h3>
          </td>

          <td align="right">
            <h4 class="mb-1" :class="item.class">
              {{ formatMoney(item.value) }}
            </h4>
          </td>
        </tr>
      </v-table>
    </v-card-text>
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
      class: "text-h6",
    },
    {
      text: "Saving Fund",
      value: summary.value.totalSavingFund,
      class: "text-h6",
    },
    {
      text: "Electricity Fund",
      value: summary.value.totalElectricityFund,
      class: "text-h6",
    },
    {
      text: "Deduction",
      value: summary.value.totalDeduction,
      class: "text-h6",
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
