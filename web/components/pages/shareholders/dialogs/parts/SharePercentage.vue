<template>
  <v-card-text>
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Share Percentage</h3>
      </v-col>

      <v-col v-if="error" class="pb-0" cols="12">
        <v-alert type="warning" density="comfortable" variant="flat">
          {{ error }}
        </v-alert>
      </v-col>

      <v-col cols="3" class="mx-auto">
        <AppTextField
          type="number"
          label="Share"
          suffix="%"
          @change="watchKeypress"
          :disabled="disable"
          v-model="data.share"
        />
      </v-col>
    </v-row>
  </v-card-text>
</template>

<script setup lang="ts">
import { PropType, watch } from "vue";
import { useShareholderStore } from "~~/store/shareholder";
import { CreateShareholder } from "~~/types/Shareholder";

const shareholderStore = useShareholderStore();

const emit = defineEmits(["update:modelValue"]);
const maxShare = shareholderStore.maxShare;
const totalShare = shareholderStore.shareInfo.total;
const error = ref("");

const props = defineProps({
  modelValue: {
    type: Object as PropType<CreateShareholder>,
    default: {},
  },
});

const disable = computed(() => {
  return totalShare >= maxShare;
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
  if (value >= totalShare) {
    data.value.share = totalShare;
  }
};

watchEffect(function () {
  if (disable) {
    error.value = `Share partition reached ${maxShare}%, In order to add new shareholder you must decrease the other's shares`;
  }
});
</script>

<style></style>
