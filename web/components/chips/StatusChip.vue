<template>
  <v-chip
    class="text-capitalize"
    :variant="variant"
    :size="size"
    :color="status.color"
    >{{ status.text }}</v-chip
  >
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { CoinsOutStatus } from "~~/types/CoinsOut";

const props = defineProps({
  status: {
    type: String as PropType<CoinsOutStatus>,
  },
  variant: {
    default: "flat",
    type: String as PropType<
      "flat" | "text" | "elevated" | "tonal" | "outlined" | "plain" | undefined
    >,
  },

  size: {
    type: String,
  },
});

const status = computed(() => {
  let color = "";

  switch (props.status) {
    case "ongoing":
      color = "warning";
      break;

    case "completed":
      color = "success";
      break;
  }

  return {
    color,
    text: props.status,
  };
});
</script>

<style></style>
