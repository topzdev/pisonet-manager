<template>
  <v-card-text>
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Share Percentage</h3>
      </v-col>
      <v-col cols="3" class="mx-auto">
        <AppTextField
          type="number"
          label="Share"
          suffix="%"
          @keypress="watchKeypress"
          v-model="data.share"
        />
      </v-col>
    </v-row>
  </v-card-text>
</template>

<script setup lang="ts">
import { PropType } from "vue";

type CreateShareholder = {
  share: number;
};

const max = 100;

const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
  modelValue: {
    type: Object as PropType<CreateShareholder>,
    default: {},
  },
});

const data = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});

const watchKeypress = (value: any) => {
  console.log(value);
  if (value >= max) {
    data.value.share = max;
  }
};
</script>

<style></style>
