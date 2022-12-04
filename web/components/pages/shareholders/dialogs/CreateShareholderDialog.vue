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
    share: yup.number().required().max(maxValue.value).label("Share"),
  }),
  yup.object({
    color: yup.string().required(),
  }),
  yup.object({
    firstname: yup.string().required().label("Firstname"),
    lastname: yup.string().required().label("Lastname"),
    email: yup.string().email().required().label("Email Address"),
    password: yup.string().min(8).required().label("Password"),
    username: yup.string().required().label("username"),
    confirmPassword: yup
      .string()
      .required()
      .oneOf([yup.ref("password")], "Passwords must match")
      .label("Confirm Password"),
  }),
];

const currentSchema = computed(() => validationSchema[step.value - 1]);

const { values, handleSubmit, setFieldValue } = useForm<CreateShareholder>({
  validationSchema: currentSchema,
  keepValuesOnUnmount: true,
  initialValues: {
    percentage: 0,
    confirmPassword: "",
    username: "",
    email: "",
    firstname: "",
    lastname: "",
    password: "",
    color: "purple",
  },
});

// watch(maxValue, (newMaxValue) => {
//   setFieldValue("percentage", newMaxValue);
// });

const disable = computed(
  () => totalShare.value >= maxShare.value && values.percentage < maxValue.value
);

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
  console.log(step);

  if (!isLastStep.value) {
    step.value++;
    return;
  }

  loading.value = true;

  systemStore.showSnackbar({
    color: "primary",
    message: "Hello, World!",
    show: true,
    timeout: 10000,
  });

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
