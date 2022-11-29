<script setup lang="ts">
import { pageRoutes } from "~~/configs/page-routes";
import { useShareholderStore } from "~~/store/shareholder";
import * as yup from "yup";

import Information from "./parts/Information.vue";
import SharePercentage from "./parts/SharePercentage.vue";
import { useForm } from "vee-validate";
import { CreateShareholder } from "~~/types/Shareholder";

const router = useRouter();
const shareholderStore = useShareholderStore();
const totalShare = shareholderStore.shareInfo.total;
const maxShare = shareholderStore.maxShare;
const disable = computed(() => totalShare >= maxShare);

const dialog = ref(true);
const loading = ref(false);
const step = ref(1);
const lastStep = 2;
const isLastStep = computed(() => {
  return step.value === lastStep;
});

const validationSchema = [
  yup.object({
    share: yup
      .number()
      .required()
      .max(maxShare - totalShare)
      .label("Share"),
  }),
  yup.object({
    firstname: yup.string().required().label("Firstname"),
    lastname: yup.string().required().label("Lastname"),
    email: yup.string().email().required().label("Email Address"),
    password: yup.string().min(8).required().label("Password"),
    confirmPassword: yup
      .string()
      .required()
      .oneOf([yup.ref("password")], "Passwords must match")
      .label("Confirm Password"),
  }),
];

const currentSchema = computed(() => validationSchema[step.value - 1]);

const { values, handleSubmit } = useForm<CreateShareholder>({
  validationSchema: currentSchema,
  keepValuesOnUnmount: true,
  initialValues: {
    share: maxShare - totalShare,
    confirmPassword: "",
    email: "",
    firstname: "",
    lastname: "",
    password: "",
  },
});

const closeLabel = computed(() => {
  if (step.value <= 1) {
    return "Close";
  } else {
    return "Back";
  }
});

const onPrev = () => {
  step.value--;

  if (step.value <= 0) {
    dialog.value = false;
    router.push(pageRoutes.shareholders.to);
  }
};

const onSubmit = handleSubmit((values) => {
  if (!isLastStep.value) {
    step.value++;
    return;
  }

  loading.value = true;

  setTimeout(() => {
    loading.value = false;
  }, 5000);
});
</script>

<template>
  <v-dialog width="500" v-model="dialog" persistent>
    <v-form @submit.prevent="onSubmit" :disabled="loading">
      <v-card :loading="loading">
        <v-card-title>Add Shareholder</v-card-title>

        <SharePercentage v-if="step === 1" :data="values" />
        <Information v-if="step === 2" />

        <v-card-actions>
          <v-btn
            class="text-medium-ephasis"
            v-text="closeLabel"
            @click="onPrev"
          ></v-btn>

          <v-btn
            type="submit"
            class="ml-auto"
            color="primary"
            size="large"
            variant="elevated"
            :disabled="disable || loading"
            :loading="loading"
            >Next</v-btn
          >
        </v-card-actions>
      </v-card>
    </v-form>
  </v-dialog>
</template>
