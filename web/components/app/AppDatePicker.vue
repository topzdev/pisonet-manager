<template>
  <v-row>
    <v-col class="py-0" cols="12">
      <label class="text-caption text-medium-emphasis" v-text="label"></label>
    </v-col>
    <v-col class="pt-0" cols="5">
      <v-select
        :hide-details="hideDetails"
        label="Month"
        :items="months"
        v-model="month"
        item-title="text"
        item-value="value"
      ></v-select>
    </v-col>
    <v-col class="pt-0" cols="3">
      <v-select
        :hide-details="hideDetails"
        label="Day"
        :items="days"
        v-model="day"
      ></v-select>
    </v-col>
    <v-col class="pt-0" cols="4">
      <v-select
        :hide-details="hideDetails"
        label="Year"
        :items="years"
        v-model="year"
      ></v-select>
    </v-col>
  </v-row>
</template>

<script setup lang="ts">
import dayjs from "dayjs";
import { PropType } from "vue";
import { inputProps, textareaProps } from "~~/configs/input-common";

const props = defineProps({ ...inputProps, ...textareaProps });
const emit = defineEmits(["update:modelValue"]);

const months = [
  { value: 1, text: "January" },
  { value: 2, text: "February" },
  { value: 3, text: "March" },
  { value: 4, text: "April" },
  { value: 5, text: "May" },
  { value: 6, text: "June" },
  { value: 7, text: "July" },
  { value: 8, text: "August" },
  { value: 9, text: "September" },
  { value: 10, text: "October" },
  { value: 11, text: "November" },
  { value: 12, text: "December" },
];

const date = new Date(props.modelValue);
let years: number[] = [];

const day = ref(date.getDate());
const year = ref(date.getFullYear());
const month = ref(months[date.getMonth()].value);

for (let i = year.value; i >= year.value - 50; i--) {
  years.push(i);
}

const days = computed(() => {
  const item = [];

  for (let i = 1; i <= 31; i++) {
    item.push(i);
  }

  return item;
});

const dateSelected = computed(() => {
  const value = `${month.value}/${day.value}/${year.value}`;
  return value;
});

watch([day, year, month], function () {
  emit("update:modelValue", dateSelected);
});
</script>

<style></style>
