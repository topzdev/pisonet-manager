<template>
  <v-textarea
    :label="label"
    :hide-details="hideDetails"
    color="primary"
    v-model="value"
    :rows="3"
  ></v-textarea>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { inputProps, textareaProps } from "~~/configs/input-common";
const props = defineProps({ ...inputProps, ...textareaProps });
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
