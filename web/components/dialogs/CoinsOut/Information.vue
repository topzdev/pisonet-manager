<template>
  <v-card-text class="d-flex flex-column">
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Information</h3>
      </v-col>

      <v-col cols="12">
        <v-row>
          <v-col cols="12">
            <AppTextField
              label="Title"
              hide-details="auto"
              color="primary"
              v-model="value.title"
            ></AppTextField>
          </v-col>

          <v-col cols="12">
            <AppTextarea
              color="primary"
              label="Description"
              hide-details="auto"
              v-model="value.description"
            ></AppTextarea>
          </v-col>

          <v-col cols="12">
            <ShareholdersSelect
              v-model="value.shareholders"
              label="Shareholders"
            />
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-card-text>
</template>

<script setup lang="ts">
import ShareholdersSelect from "@/components/inputs/ShareholdersSelect.vue";
import { PropType } from "vue";

const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
  modelValue: {
    type: [String, Number, Object] as PropType<any>,
  },
});

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
</script>

<style></style>
