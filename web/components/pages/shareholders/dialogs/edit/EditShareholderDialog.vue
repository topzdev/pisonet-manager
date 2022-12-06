<script setup lang="ts">
import { pageRoutes } from "~~/configs/page-routes";
import Information from "./parts/Information.vue";

let loading = ref(false);
let dialog = ref(true);
let disable = ref(false);
let tab = ref(1);
const router = useRouter();

const onBack = () => {
  router.push(pageRoutes.shareholders.to);
};

const onSubmit = () => {};
</script>

<template>
  <v-dialog width="500" v-model="dialog" persistent>
    <v-form @submit.prevent="onSubmit" :disabled="loading">
      <v-card :loading="loading">
        <v-card-title>Edit Shareholder</v-card-title>
        <v-tabs v-model="tab" color="primary">
          <v-tab :value="1">Information</v-tab>
          <v-tab :value="2">Share</v-tab>
          <v-tab :value="3">Settings</v-tab>
        </v-tabs>

        <v-window v-model="tab">
          <v-window-item :value="1">
            <Information />
          </v-window-item>

          <v-window-item :value="2"> Two </v-window-item>
          <v-window-item :value="3"> Settings </v-window-item>
        </v-window>

        <v-card-actions>
          <v-btn class="text-medium-ephasis" @click="onBack">Close</v-btn>

          <v-btn
            type="submit"
            class="ml-auto"
            color="primary"
            size="large"
            variant="elevated"
            :disabled="disable || loading"
            :loading="loading"
            >Submit</v-btn
          >
        </v-card-actions>
      </v-card>
    </v-form>
  </v-dialog>
</template>
