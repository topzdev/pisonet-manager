<template>
  <v-table fixed-header>
    <thead>
      <tr>
        <th class="text-left">Shareholders</th>
        <th class="text-left">Sales</th>
        <th class="text-left">Saving Funds</th>
        <th class="text-left">Electricity</th>
        <th class="text-left">Total Deduction</th>
        <th class="text-left">Total Payout</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, idx) in items" :key="idx">
        <td class="py-2">
          <p class="text-body mb-1">
            <v-avatar :color="item.color">
              <span> {{ item.initials }}</span>
            </v-avatar>

            <span class="font-weight-bold ml-2">
              {{ item.text }}
            </span>
          </p>
        </td>
        <td class="py-3" width="15%">
          <AppTextField density="compact" v-model="item.sales" type="number" />
        </td>
        <td>{{ item.savingFunds }}</td>
        <td>{{ item.electricity }}</td>
        <td>{{ item.totalDeductions }}</td>
        <td>{{ item.totalPayout }}</td>
      </tr>
    </tbody>
  </v-table>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { CoinsOut } from "~~/types/CoinsOut";

const props = defineProps({
  data: {
    type: Object as PropType<CoinsOut>,
    default: {},
  },
});
const data = props.data;

const items = reactive(
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
