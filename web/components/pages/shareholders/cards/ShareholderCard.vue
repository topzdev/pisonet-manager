<template>
  <v-card>
    <v-card-text>
      <v-row>
        <v-col class="d-flex align-center">
          <v-avatar :color="data.color || 'grey'">
            <span> {{ data.initials }} </span>
          </v-avatar>

          <div>
            <h3 class="ml-2 font-weight-regular text-capitalize">
              {{ data.firstname }} {{ data.lastname }}

              <!-- <v-icon
                v-if="data.is_admin"
                size="small"
                title="Administrator"
                icon="mdi-shield-crown-outline"
              ></v-icon> -->
            </h3>

            <p class="text-medium-emphasis ml-2">
              <b>{{ data.percentage }}%</b>
              shares
            </p>
          </div>
        </v-col>

        <v-col cols="auto" class="ml-auto"> </v-col>

        <v-col cols="auto" class="ml-auto">
          <v-btn variant="text" color="primary">Edit</v-btn>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import { Shareholder } from "~~/types/CoinsOut";

const props = defineProps({
  data: {
    type: Object as PropType<Shareholder>,
    default: {},
  },
});
</script>

<style></style>
