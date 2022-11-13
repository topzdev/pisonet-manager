<template>
  <v-navigation-drawer v-model="drawer" permanent>
    <v-list>
      <v-list-item v-for="(item, idx) in items" :key="idx" :to="item.to">
        <template v-slot:prepend>
          <v-icon :icon="item.icon"></v-icon>
        </template>

        <v-list-item-title v-text="item.name"></v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup lang="ts">
const props = defineProps(["modelValue"]);
const emit = defineEmits(["update:modelValue"]);
const items = ref([
  { icon: "mdi-view-dashboard-outline", name: "Dashboard", to: "/dashboard" },
  { icon: "mdi-chart-line", name: "Sales", to: "/sales" },
  { icon: "mdi-cog-outline", name: "Settings", to: "/settings" },
]);

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
