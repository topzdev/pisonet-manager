<template>
  <v-card-text>
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Information</h3>
      </v-col>
      <v-col cols="6">
        <AppTextField label="Firstname" v-model="value.firstname" />
      </v-col>
      <v-col cols="6">
        <AppTextField label="Lastname" v-model="value.lastname" />
      </v-col>
      <v-col cols="12">
        <AppTextField label="Email" v-model="value.password" />
      </v-col>

      <v-col cols="12">
        <AppTextField label="Password" type="password" v-model="value.email" />
      </v-col>
      <v-col cols="12">
        <AppTextField
          label="Confirm Password"
          type="password"
          v-model="value.confirmPassword"
        />
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
