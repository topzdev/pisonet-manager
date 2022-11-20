<template>
  <v-card variant="elevated">
    <v-card-title>
      {{ coinsOut.title }}

      <StatusChip :status="coinsOut.status" />
    </v-card-title>
    <v-card-text>
      <v-row class="mb-3" v-if="computation">
        <v-col v-for="(item, idx) in computation" lg="3">
          <p
            class="d-flex align-items mb-1"
            :class="item.color + '-lighten-2'"
            :key="idx"
          >
            <v-icon class="mr-1" :icon="item.icon"></v-icon>
            <span>{{ item.label }}</span>
          </p>

          <p :class="item.color">
            <b>{{ item.value }}</b>
          </p>
        </v-col>
      </v-row>

      <v-row>
        <v-col lg="4">
          <p class="d-flex align-items text-medium-emphasis mb-1">
            <v-icon class="mr-1" icon="mdi-calendar"></v-icon>
            <span>Start and End Date</span>
          </p>

          <p class="text-high-emphasis">
            {{ datesFormated.start_date }} to {{ datesFormated.end_dates }}
          </p>
        </v-col>

        <v-col lg="4">
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
            :shareholders="coinsOut.shareholders"
            :max-to-show="2"
            avatar-size="x-small"
          />
        </v-col>
      </v-row>
    </v-card-text>
    <v-card-actions class="justify-end">
      <v-btn color="primary">View</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { CoinsOut } from "~~/types/CoinsOut";
import StatusChip from "@/components/chips/StatusChip.vue";
import dayjs from "dayjs";
import ShareholdersSummary from "../customs/ShareholdersSummary.vue";
import moneyFormatter from "~~/utils/moneyFormatter";

const props = defineProps({
  coinsOut: {
    required: true,
    type: Object as PropType<CoinsOut>,
  },
});

const coinsOut = props.coinsOut;

const datesFormated = computed(() => {
  return {
    start_date: dayjs(coinsOut.start_date).format("MM/DD/YYYY"),
    end_dates: dayjs(coinsOut.end_date).format("MM/DD/YYYY"),
  };
});

const electricityInfo = useElectricityInfo(coinsOut);

const computation = computed(() => {
  const value = coinsOut.computation;

  return value
    ? [
        {
          label: "Total Sales",
          icon: "mdi-account-cash-outline",
          value: moneyFormatter().format(value.total_sales),
          color: "text-blue",
        },
        {
          label: "Saving Funds",
          icon: "mdi-piggy-bank-outline",
          value: moneyFormatter().format(value.saving_funds),
          color: "text-orange",
        },
        {
          label: "Total Deduction",
          icon: "mdi-content-cut",
          value: moneyFormatter().format(value.total_deduction),
          color: "text-red",
        },
        {
          label: "Final Sales",
          icon: "mdi-cash-check",
          value: moneyFormatter().format(value.final_sales),
          color: "text-green",
        },
      ]
    : null;
});
</script>

<style></style>
