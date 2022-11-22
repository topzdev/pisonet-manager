<template>
  <AppPageBar back>
    <template v-slot:title> Shareholders </template>

    <template v-slot:button>
      <v-btn color="primary" :to="pageRoutes.shareholders.subpages.create.to">
        Add Shareholder
      </v-btn>
    </template>
  </AppPageBar>

  <v-container>
    <v-row>
      <v-col cols="4" class="mx-auto">
        <v-row>
          <v-col class="d-flex align-center justify-end" cols="12">
            <p class="text-medium-emphasis mr-2">Partitioned shares</p>
            <h3 class="text-h4" :class="shareInfo.color">
              {{ shareInfo.total }}/{{ maxShare }}%
            </h3>
          </v-col>
        </v-row>
        <v-row>
          <v-col v-for="(item, idx) in shareholders" :key="idx" cols="12">
            <ShareholderCard :data="item"></ShareholderCard>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
  <NuxtPage />
</template>

<script setup lang="ts">
import { Shareholder } from "~~/types/CoinsOut";
import ShareholderCard from "~~/components/pages/shareholders/cards/ShareholderCard.vue";
import { pageRoutes } from "~~/configs/page-routes";
import { config } from "~~/configs";

const maxShare = config.maxShareholderShares;

const shareholders = reactive<Shareholder[]>([
  {
    id: 1,
    username: "topzdev",
    firstname: "Christopher",
    lastname: "Lugod",
    initials: "CL",
    color: "green",
    percentage: 25,
    email: "christianlugod05@gmail.com",
    is_admin: true,
  },
  {
    id: 2,
    username: "christian",
    firstname: "Christian",
    lastname: "Lugod",
    initials: "CL",
    color: "red",
    percentage: 25,

    email: "christianlugod05@gmail.com",
    is_admin: false,
  },
  {
    id: 3,
    username: "christian",
    firstname: "Charity",
    lastname: "Lugod",
    initials: "SL",
    color: "purple",
    percentage: 25,
    email: "christianlugod05@gmail.com",
    is_admin: false,
  },
  {
    id: 4,
    username: "christian",
    firstname: "Cedric",
    lastname: "Lugod",
    initials: "AL",
    color: "blue",
    percentage: 25,
    email: "christianlugod05@gmail.com",
    is_admin: false,
  },
]);

const shareInfo = computed(() => {
  const total = shareholders.reduce((acc, cur) => {
    return acc + cur.percentage;
  }, 0);

  return {
    total,
    color: total === 100 ? "text-success" : "text-warning",
  };
});
</script>

<style></style>
