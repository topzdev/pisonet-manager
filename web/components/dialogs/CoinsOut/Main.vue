<template>
  <v-dialog width="600" v-model="dialog" persistent>
    <v-card>
      <v-card-title> Create Coins Out </v-card-title>

      <CoinsOutSelectDates v-model="data.dates" v-if="part === 1" />
      <CoinsOutPreferences v-model="data.preferences" v-else-if="part == 2" />
      <CoinsOutInformation v-model="data.information" v-else-if="part === 3" />

      <v-card-actions>
        <v-btn
          class="medium-ephasis"
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
import CoinsOutPreferences from "@/components/dialogs/CoinsOut/Preferences.vue";
import CoinsOutSelectDates from "@/components/dialogs/CoinsOut/SelectDates.vue";
import CoinsOutInformation from "@/components/dialogs/CoinsOut/Information.vue";
import { pageRoutes } from "~~/configs/page-routes";
import { PropType } from "nuxt/dist/app/compat/vue-demi";

const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
  modelValue: {
    type: [Boolean] as PropType<any>,
  },
});

const dialog = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});

const data = reactive({
  dates: {
    start_date: "11/19/2022",
    end_date: "11/19/2022",
  },
  preferences: {
    savings_fund_id: null,
    electricity_charge_id: null,
  },
  information: {
    title: "",
    description: "",
    shareholders: [],
  },
});

const part = ref(1);
const maxPart = 3;

const onPaginate = (type: "back" | "next") => {
  const router = useRouter();
  if (type === "next") {
    part.value++;
  } else {
    part.value--;
  }

  if (part.value <= 0) {
    dialog.value = false;
    part.value = 1;
  }

  if (part.value > maxPart) {
    dialog.value = false;
    part.value = maxPart;
    router.push(pageRoutes.sales.subpages.view(1).to);
  }
};

const closeLabel = computed(function () {
  if (part.value <= 1) {
    return "Close";
  } else {
    return "Back";
  }
});
</script>

<style></style>
