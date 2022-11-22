<template>
  <v-dialog width="500" v-model="dialog" persistent>
    <v-card>
      <v-card-title>Add Shareholder</v-card-title>
      <Information v-if="part === 1" v-model="data" />

      <v-card-actions>
        <v-btn
          class="text-medium-ephasis"
          v-text="closeLabel"
          @click="onPaginate('back')"
        ></v-btn>

        <v-btn
          class="ml-auto"
          color="primary"
          size="large"
          variant="elevated"
          @click="onPaginate('next')"
          >Next</v-btn
        >
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import { pageRoutes } from "~~/configs/page-routes";
import Information from "./parts/Information.vue";

const router = useRouter();

const { part, dialog, onPaginate, closeLabel } = useDialogPagination({
  startPart: 1,
  maxPart: 2,
  final: () => {
    router.push(pageRoutes.shareholders.to);
  },
  exit: () => {
    router.push(pageRoutes.shareholders.to);
  },
  open: true,
});

const data = reactive({
  firstname: "",
  lastname: "",
  email: "",
  password: "",
  confirmPassword: "",
});
</script>

<style></style>
