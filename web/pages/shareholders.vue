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
import ShareholderCard from "~~/components/pages/shareholders/cards/ShareholderCard.vue";
import { pageRoutes } from "~~/configs/page-routes";
import { useShareholderStore } from "~~/store/shareholder";

const shareholderStore = useShareholderStore();
const maxShare = shareholderStore.maxShare;
const shareholders = shareholderStore.list;
const shareInfo = shareholderStore.shareInfo;

await shareholderStore.getShareholder();
</script>

<style></style>
