<template>
  <v-card-text>
    <v-row>
      <v-col class="d-flex py-0" cols="12">
        <h3 class="mx-auto text-medium-emphasis">Information</h3>
      </v-col>
      <v-col cols="6">
        <AppTextField label="Firstname" name="firstname" />
      </v-col>
      <v-col cols="6">
        <AppTextField label="Lastname" name="lastname" />
      </v-col>
      <v-col cols="6">
        <apptextfield type="email" label="email" name="email" />
      </v-col>

      <v-col cols="6">
        <apptextfield type="username" label="email" name="email" />
      </v-col>

      <v-col cols="6">
        <AppTextField label="Password" type="password" name="password" />
      </v-col>
      <v-col cols="6">
        <AppTextField
          label="Confirm Password"
          type="password"
          name="confirmPassword"
        />
      </v-col>
    </v-row>
  </v-card-text>
</template>

<script setup lang="ts"></script>

<style></style>
