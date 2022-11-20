<template>
  <v-text-field
    :label="label"
    :hide-details="hideDetails"
    color="primary"
    v-model="value"
  ></v-text-field>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { inputProps } from "@/configs/input-common";
const props = defineProps(inputProps);
const emit = defineEmits(["update:modelValue"]);

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
