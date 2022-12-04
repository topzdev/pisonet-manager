<template>
  <v-card-text>
    <v-row>
      {{ maxShare }} - {{ totalShare }}
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Share Percentage</h3>
      </v-col>

      <v-col v-if="alert.message" class="pb-0" cols="12">
        <v-alert :type="alert.type" density="comfortable" variant="flat">
          {{ alert.message }}
        </v-alert>
      </v-col>

      <v-col cols="3" class="mx-auto">
        <AppTextField
          type="number"
          label="Share"
          name="percentage"
          suffix="%"
          hide-details
          :disabled="disable"
        />
      </v-col>
    </v-row>
  </v-card-text>
</template>

<script setup lang="ts">
import { storeToRefs } from "pinia";
import { PropType, watch } from "vue";
import { useShareholderStore } from "~~/store/shareholder";
import { CreateShareholder } from "~~/types/Shareholder";

const alert = reactive({
  message: "",
  type: "" as any,
});
const props = defineProps({
  data: {
    type: Object as PropType<CreateShareholder>,
    default: {},
  },

  totalShare: {
    type: Number,
    default: 0,
  },

  maxShare: {
    type: Number,
    default: 0,
  },
});

const totalShare = computed(() => props.totalShare);
const maxShare = computed(() => props.maxShare);
const percentage = computed(() => props.data.percentage);

const disable = computed(() => {
  return totalShare.value >= maxShare.value;
});

watch(percentage, (newValue) => {
  if (newValue > maxShare.value - totalShare.value) {
    alert.message = "Must not exceed to remaining share";
    alert.type = "error";
  } else if (!newValue) {
    alert.message = "Share is required";
    alert.type = "error";
  } else {
    alert.message = "";
  }
});

watchEffect(function () {
  if (disable.value) {
    alert.message = `Share partition reached ${maxShare}%, In order to add new shareholder you must decrease the other's shares`;
    alert.type = "warning";
  } else {
    alert.message = "";
    alert.type = "";
  }
});
</script>

<style></style>
