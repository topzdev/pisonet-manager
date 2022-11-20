<template>
  <v-card-text class="d-flex flex-column">
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Select Dates</h3>
      </v-col>
      <v-col cols="12">
        <app-date-picker
          v-model="value.start_date"
          label="Start Date"
        ></app-date-picker>
      </v-col>
      <v-col cols="12">
        <app-date-picker
          v-model="value.end_date"
          label="End Date"
        ></app-date-picker>
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
</script>

<style></style>
