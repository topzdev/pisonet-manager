<script setup lang="ts">
import { pageRoutes } from "~~/configs/page-routes";
import { useShareholderStore } from "~~/store/shareholder";
import * as yup from "yup";

import Information from "./parts/Information.vue";
import SharePercentage from "./parts/SharePercentage.vue";
import Personalize from "./parts/Personalize.vue";
import { useForm } from "vee-validate";
import { CreateShareholder } from "~~/types/Shareholder";
import { storeToRefs } from "pinia";
import { useSystemStore } from "~~/store/system";
import { useCreateShareholder } from "~~/composables/services/shareholder";

const router = useRouter();
const systemStore = useSystemStore();

const { shareInfo, maxShare } = storeToRefs(useShareholderStore());

const dialog = ref(true);
const loading = ref(false);
const step = ref(1);
const lastStep = 3;

const isLastStep = computed(() => {
  return step.value === lastStep;
});

const totalShare = computed(() => {
  return shareInfo.value?.total || 0;
});

const maxValue = computed(() => {
  return maxShare.value - totalShare.value;
});

const validationSchema = [
  yup.object({
    percentage: yup.number().required().max(maxValue.value).label("Share"),
  }),
  yup.object({
    color: yup.string().required(),
  }),
  yup.object({
    firstname: yup.string().required().label("Firstname"),
    lastname: yup.string().required().label("Lastname"),
    email: yup.string().email().required().label("Email Address"),
    password: yup.string().min(8).max(124).required().label("Password"),
    username: yup.string().required().min(6).max(255).label("username"),
    password_confirmation: yup
      .string()
      .required()
      .oneOf([yup.ref("password")], "Passwords must match")
      .label("Confirm Password"),
  }),
];

const currentSchema = computed(() => validationSchema[step.value - 1]);

const { values, handleSubmit, setFieldValue, setErrors } =
  useForm<CreateShareholder>({
    validationSchema: currentSchema,
    keepValuesOnUnmount: true,
    initialValues: {
      percentage: maxValue.value,
      password_confirmation: "",
      username: "",
      email: "",
      firstname: "",
      lastname: "",
      password: "",
      color: "purple",
    },
  });

watch(maxValue, (newMaxValue) => {
  setFieldValue("percentage", newMaxValue);
});

const disable = computed(
  () => totalShare.value >= maxShare.value || values.percentage > maxValue.value
);

const closeLabel = computed(() => {
  if (step.value <= 1) {
    return "Close";
  } else {
    return "Back";
  }
});

const closeDialog = () => {
  dialog.value = false;
  router.push(pageRoutes.shareholders.to);
};

const onPrev = () => {
  step.value--;

  if (step.value <= 0) {
    closeDialog();
  }
};

const onSubmit = handleSubmit(async (values) => {
  if (!isLastStep.value) {
    step.value++;
    return;
  }

  loading.value = true;

  try {
    const { data, error } = await useCreateShareholder(values);

    if (error.value && error.value.data && error.value.data.errors) {
      systemStore.showSnackbar({
        color: "error",
        message: error.value.data.message,
        show: true,
        timeout: 5000,
      });
      return setErrors(error.value.data.errors as any);
    }

    closeDialog();

    systemStore.showSnackbar({
      color: "success",
      message: "Shareholder Added",
      show: true,
      timeout: 5000,
    });
  } catch (error) {
    console.log("Error", error);
  } finally {
    loading.value = false;
  }
});
</script>

<template>
  <v-dialog width="500" v-model="dialog" persistent>
    <v-form @submit.prevent="onSubmit" :disabled="loading">
      <v-card :loading="loading">
        <v-card-title>Add Shareholder</v-card-title>

        <SharePercentage
          v-if="step === 1"
          :data="values"
          :total-share="totalShare"
          :max-share="maxShare"
        />
        <Personalize v-if="step === 2" />
        <Information v-if="step === 3" />

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
