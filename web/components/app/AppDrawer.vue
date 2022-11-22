<template>
  <v-navigation-drawer v-model="drawer" permanent>
    <v-list>
      <v-list-item v-for="(item, idx) in items" :key="idx" :to="item.to">
        <template v-slot:prepend>
          <v-icon :icon="item.icon"></v-icon>
        </template>

        <v-list-item-title v-text="item.title"></v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup lang="ts">
import { pageRoutes } from "~~/configs/page-routes";

const props = defineProps(["modelValue"]);
const emit = defineEmits(["update:modelValue"]);

const { dashboard, sales, shareholders, settings } = pageRoutes;

const items = ref([dashboard, sales, shareholders, settings]);

const drawer = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
</script>

<style></style>
