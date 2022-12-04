<script setup lang="ts">
import { storeToRefs } from "pinia";
import { useSystemStore } from "~~/store/system";

const systemStore = useSystemStore();

const { snackbar } = storeToRefs(systemStore);

const show = computed({
  get() {
    return snackbar.value.show;
  },
  set(value) {
    snackbar.value.show = value;
  },
});

const reset = () => {
  systemStore.resetSnackbar();
};
</script>

<template>
  <v-snackbar
    v-model="show"
    :timeout="snackbar.timeout"
    :color="snackbar.color"
  >
    {{ snackbar.message }}

    <template v-slot:actions>
      <v-btn text @click="reset"> Close </v-btn>
    </template>
  </v-snackbar>
</template>

<style></style>
