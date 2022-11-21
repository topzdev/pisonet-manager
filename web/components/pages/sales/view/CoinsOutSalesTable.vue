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
        <td class="py-2" width="20%">
          <div class="d-flex text-body mb-1">
            <v-avatar :color="item.color">
              <span> {{ item.initials }}</span>
            </v-avatar>
            <p class="ml-2">
              <span class="font-weight-bold text-no-wrap">
                {{ item.firstname }} {{ item.lastname }}
              </span>
              <br />
              <span class="text-medium-emphasis">{{ item.percentage }}% </span>
            </p>
          </div>
        </td>
        <td class="py-3" width="15%">
          <AppTextField
            prefix="₱"
            density="compact"
            v-model.number="item.sales"
            type="number"
            @keyup="calculation(idx)"
          />
        </td>
        <td>{{ formatMoney(item.savingFunds) }}</td>
        <td>{{ formatMoney(item.electricity) }}</td>
        <td>{{ formatMoney(item.totalDeductions) }}</td>
        <td>{{ formatMoney(item.totalPayout) }}</td>
      </tr>
    </tbody>
  </v-table>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { inputProps } from "~~/configs/input-common";
import { CoinsOut, ShareholderSale } from "~~/types/CoinsOut";

const props = defineProps({
  modelValue: {
    type: [String, Number, Boolean, Array] as PropType<ShareholderSale[]>,
    default: {},
  },
  data: {
    type: Object as PropType<CoinsOut>,
    default: {},
  },
});

const emit = defineEmits(["update:modelValue"]);

const data = props.data;

const electricity_charge =
  data.electricity_charge.kwh * data.electricity_charge.kwh_charge;
const saving_fund = data.saving_fund.percentage;

const items = props.modelValue;

const calculation = (index: number) => {
  let shareholder = toRaw(items[index]);
  let sales = shareholder.sales;
  let savingFunds = sales * (saving_fund / 100);
  let electricity = (electricity_charge / 4) * (shareholder.percentage / 100);
  let totalDeduction = savingFunds + electricity;
  let totalPayout = sales - totalDeduction;

  shareholder.savingFunds = savingFunds;
  shareholder.electricity = electricity;
  shareholder.totalDeductions = totalDeduction;
  shareholder.totalPayout = totalPayout;
  items[index] = shareholder;
  emit("update:modelValue", items);
};

const formatMoney = (value: number) => {
  return moneyFormatter().format(value);
};
</script>

<style></style>
