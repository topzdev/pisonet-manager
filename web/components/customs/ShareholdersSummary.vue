<template>
  <div class="d-flex align-center text-high-emphasis">
    <template v-if="summary">
      <div class="mr-1">
        <v-avatar
          v-for="(item, index) in summary.itemToShow"
          :color="item.color"
          :key="index"
          :size="avatarSize"
          class="ml-n3"
          :title="item.title"
        >
          <span> {{ item.text }}</span>
        </v-avatar>
      </div>

      <span class="d-inline-block text-truncate">{{ summary.namesText }}</span>
    </template>

    <template v-else>
      <p class="text-caption text-disabled">No Shareholders</p>
    </template>
  </div>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { Shareholder } from "~~/types/CoinsOut";

const props = defineProps({
  shareholders: {
    type: Array as PropType<Shareholder[]>,
  },

  maxToShow: {
    type: Number,
    default: 2,
  },

  avatarSize: {
    type: String,
  },
});

const summary = computed(() => {
  if (!props.shareholders || !props.shareholders.length) return;

  const maxToShow = props.maxToShow;
  const itemToShow = props.shareholders.slice(0, maxToShow).map((item) => ({
    color: item.color,
    text: item.initials,

    title: item.firstname,
  }));
  const remainingItem = props.shareholders.slice(
    maxToShow,
    props.shareholders.length
  );
  let namesText = itemToShow.map((item) => item.title).join(",");

  const remainingLength = remainingItem.length;
  if (remainingLength) {
    namesText += " and " + remainingLength + " more";

    itemToShow.push({
      color: "primary",
      text: "+" + remainingLength,
      title: "and " + remainingItem.map((item) => item.firstname).join(","),
    });
  }

  return {
    itemToShow,
    remainingItem,
    namesText: namesText,
  };
});
</script>

<style></style>
