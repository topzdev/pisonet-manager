<script setup lang="ts">
import { PropType } from "vue";
import { useField } from "vee-validate";
import { inputProps } from "@/configs/input-common";
const props = defineProps(inputProps);
const emit = defineEmits(["update:modelValue", "keypress"]);

const { value, handleBlur, errors } = useField(toRef(props, "name"), undefined);
</script>

<template>
  <v-text-field
    :type="type"
    :label="label"
    @blur="handleBlur"
    :error-messages="errors"
    :hide-details="hideDetails"
    color="primary"
    v-model="value"
    :density="density"
    :suffix="suffix"
    :disabled="disabled"
    :rules="rules"
    :name="name"
  ></v-text-field>
</template>
