<template>
  <v-select
    v-model="value"
    :items="shareholders"
    :loading="pending"
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
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { Shareholder } from "~~/types/CoinsOut";
import { inputProps } from "@/configs/input-common";
import { useGetShareholder } from "~~/composables/services/shareholder";

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

let shareholders = reactive<Shareholder[]>([]);

const { data, pending } = await useGetShareholder();

watch(data, (newShareholders) => {
  if (newShareholders) {
    shareholders = newShareholders;
  }
});
</script>

<style></style>
