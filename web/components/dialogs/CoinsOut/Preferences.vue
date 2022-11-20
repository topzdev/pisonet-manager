<template>
  <v-card-text>
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Preferences</h3>
      </v-col>

      <v-col cols="12">
        <v-row class="d-flex justify-center">
          <v-col cols="6">
            <v-select
              label="Savings"
              v-model="value.savings_fund_id"
              :items="savingPreference"
              item-value="id"
              item-title="text"
            ></v-select>
          </v-col>
          <v-col cols="6">
            <v-select
              class="text-truncate"
              label="Electricity"
              v-model="value.electricity_charge_id"
              :items="electricityPreference"
              item-value="id"
              item-title="text"
            ></v-select>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-card-text>
</template>

<script setup lang="ts">
import { PropType } from "vue";
const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
  modelValue: {
    type: [String, Number, Object] as PropType<any>,
  },
});

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});

const savingPreference = reactive([
  {
    id: 1,
    text: "10%",
    value: 10,
  },
  {
    id: 2,
    text: "12%",
    value: 10,
  },
]);

const electricityPreference = reactive([
  {
    id: 1,
    text: "Semptember 10 - October 10 2022",
    value: 6534,
  },
  {
    id: 2,
    text: "October 11 - November 11 2022",
    value: 7023,
  },
]);
</script>

<style></style>
