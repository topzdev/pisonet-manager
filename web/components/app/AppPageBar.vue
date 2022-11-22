<template>
  <v-toolbar border color="transparent">
    <v-btn v-if="back" icon @click="bindBack">
      <v-icon icon="mdi-chevron-left" size="x-large"></v-icon>
    </v-btn>

    <v-toolbar-title>
      <slot name="title"></slot>
    </v-toolbar-title>
    <v-spacer></v-spacer>

    <slot name="button"> </slot>
  </v-toolbar>
</template>

<script setup lang="ts">
const router = useRouter();
const props = defineProps({
  backTo: {
    type: [String, Function],
  },

  back: {
    type: Boolean,
  },
});

const bindBack = () => {
  if (props.back) {
    if (props.backTo) {
      switch (typeof props.backTo) {
        case "function":
          props.backTo();
          break;

        case "string":
          router.push(props.backTo);
          break;
      }
    } else {
      router.back();
    }
  }
};
</script>

<style></style>
