<template>
  <v-dialog width="500" v-model="dialog" persistent>
    <v-card>
      <v-card-title>Add Shareholder</v-card-title>

      <SharePercentage v-if="part === 1" v-model="data" />
      <Information v-if="part === 2" v-model="data" />

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
          :disabled="disable"
          >Next</v-btn
        >
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import { pageRoutes } from "~~/configs/page-routes";
import { useShareholderStore } from "~~/store/shareholder";
import { CreateShareholder } from "~~/types/Shareholder";
import Information from "./parts/Information.vue";
import SharePercentage from "./parts/SharePercentage.vue";
const shareholderStore = useShareholderStore();
const totalShare = shareholderStore.maxShare;
const maxShare = shareholderStore.shareInfo.total;
const disable = ref(false);

const router = useRouter();

watchEffect(function () {
  if (totalShare >= maxShare) {
    disable.value = true;
  }
});

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

const data = reactive<CreateShareholder>({
  share: 0,
  firstname: "",
  lastname: "",
  email: "",
  password: "",
  confirmPassword: "",
});
</script>

<style></style>
