<template>
  <div>
    <v-select
      v-model="value"
      :items="shareholders"
      :variant="variant"
      chips
      closable-chips
      color="primary"
      :label="label"
      item-title="username"
      item-value="id"
      multiple
    >
      <template v-slot:chip="{ props, item }">
        <v-chip
          v-bind="props"
          :text="`${item.raw.firstname} ${item.raw.lastname} (${item.raw.percentage}%)`"
        >
          <template v-slot:prepend>
            <v-avatar :color="item.raw.color" size="x-small">
              <span> {{ item.raw.initials }}</span>
            </v-avatar>
          </template>
        </v-chip>
      </template>
      <template v-slot:item="{ props, item }">
        <v-list-item
          v-bind="props"
          :title="item.raw.firstname + ' ' + item.raw.lastname"
          :subtitle="item.raw.percentage + '%'"
        >
          <template v-slot:prepend>
            <v-avatar :color="item.raw.color" size="small" :title="item.title">
              <span class="text-caption"> {{ item.raw.initials }}</span>
            </v-avatar>
          </template>
        </v-list-item>
      </template>
    </v-select>
  </div>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { Shareholder } from "~~/types/CoinsOut";
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

const shareholders = reactive<Shareholder[]>([
  {
    id: 1,
    username: "topzdev",
    firstname: "Christopher",
    lastname: "Lugod",
    initials: "CL",
    color: "green",
    percentage: 60,
  },
  {
    id: 2,
    username: "christian",
    firstname: "Christian",
    lastname: "Lugod",
    initials: "CL",
    color: "red",
    percentage: 60,
  },
  {
    id: 3,
    username: "christian",
    firstname: "Sebastian",
    lastname: "Lavarias",
    initials: "SL",
    color: "purple",
    percentage: 60,
  },
  {
    id: 4,
    username: "christian",
    firstname: "Angelo",
    lastname: "Lacap",
    initials: "AL",
    color: "blue",
    percentage: 60,
  },
]);
</script>

<style></style>
