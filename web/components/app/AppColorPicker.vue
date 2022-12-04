<script setup lang="ts">
import { PropType } from "vue";
import { useField } from "vee-validate";
import { inputProps } from "@/configs/input-common";
import systemColors from "~~/configs/system-colors";
const props = defineProps(inputProps);
const emit = defineEmits(["update:modelValue", "keypress"]);

const { value, handleBlur, errors } = useField(toRef(props, "name"), undefined);

const colors = computed(() => {
  return Object.keys(systemColors).map((key) => ({
    color: key,
    title: key.replaceAll("-", " "),
  }));
});
</script>

<template>
  <v-select
    :items="colors"
    item-value="color"
    :label="label"
    :hide-details="hideDetails"
    v-model="value"
    :name="name"
  >
    <template v-slot:selection="{ props, item }">
      <v-list-item class="px-0" v-bind="props">
        <template v-slot:prepend>
          <v-avatar
            :color="item.raw.color"
            size="small"
            :title="item.raw.title"
          >
          </v-avatar>
        </template>
        <v-list-item-title
          class="text-capitalize"
          v-text="item.raw.title"
        ></v-list-item-title>
      </v-list-item>
    </template>
    <template v-slot:item="{ props, item }">
      <v-list-item v-bind="props" title="">
        <template v-slot:prepend>
          <v-avatar
            :color="item.raw.color"
            size="small"
            :title="item.raw.title"
          >
          </v-avatar>
        </template>

        <v-list-item-title
          class="text-capitalize"
          v-text="item.raw.title"
        ></v-list-item-title>
      </v-list-item>
    </template>
  </v-select>
</template>
