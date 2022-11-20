<template>
  <p class="text-overline font-weight-bold text-medium-emphasis">
    {{ datesFormated.start_date }} - {{ datesFormated.end_dates }}
  </p>

  <h1 class="text-h4">
    {{ data.title }}
    <StatusChip :status="data.status" size="large" />
  </h1>
  <p class="mt-1 text-medium-emphasis" v-if="data.description">
    {{ data.description }}
  </p>

  <v-row class="mt-2 mb-0">
    <v-col lg="2">
      <p class="d-flex align-items text-medium-emphasis mb-1">
        <v-icon class="mr-1" icon="mdi-piggy-bank-outline"></v-icon>
        <span>Saving Fund %</span>
      </p>

      <p class="text-high-emphasis">{{ data.saving_fund.percentage }}%</p>
    </v-col>

    <v-col lg="3">
      <p class="d-flex align-items text-medium-emphasis mb-1">
        <v-icon class="mr-1" icon="mdi-lightning-bolt-outline"></v-icon>
        <span
          >Electricity - <small>{{ electricityInfo.month }}</small></span
        >
      </p>

      <p class="text-high-emphasis">
        <span>{{ electricityInfo.toPay }}</span>
        <span>
          <small class="text-medium-emphasis ml-1"
            >({{ electricityInfo.totalCharge }} /
            {{ electricityInfo.installment }})
          </small>
        </span>
      </p>
    </v-col>

    <v-col lg="4">
      <p class="d-flex align-items text-medium-emphasis mb-1">
        <v-icon class="mr-1" icon="mdi-account-group-outline"></v-icon>
        <span>Shareholders</span>
      </p>

      <ShareholdersSummary
        :shareholders="data.shareholders"
        avatar-size="small"
        :max-to-show="2"
      />
    </v-col>
  </v-row>
</template>

<script setup lang="ts">
import dayjs from "dayjs";
import { PropType } from "vue";
import { CoinsOut } from "~~/types/CoinsOut";
import StatusChip from "@/components/chips/StatusChip.vue";
import ShareholdersSummary from "@/components/customs/ShareholdersSummary.vue";

const props = defineProps({
  data: {
    type: Object as PropType<CoinsOut>,
    default: {},
  },
});
const data = props.data;

const datesFormated = computed(() => {
  return {
    start_date: dayjs(data.start_date).format("MMMM DD, YYYY"),
    end_dates: dayjs(data.end_date).format("MMMM DD, YYYY"),
  };
});

const electricityInfo = useElectricityInfo(data);
</script>

<style></style>
