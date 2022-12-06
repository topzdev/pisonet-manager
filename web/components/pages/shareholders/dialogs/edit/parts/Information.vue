<script setup lang="ts"></script>

<template>
  <v-card-text>
    <v-row>
      <v-col cols="6">
        <AppTextField label="Firstname" name="firstname" />
      </v-col>
      <v-col cols="6">
        <AppTextField label="Lastname" name="lastname" />
      </v-col>
      <v-col cols="6">
        <AppTextField type="email" label="Email" name="email" />
      </v-col>

      <v-col cols="6">
        <AppTextField label="Username" name="username" />
      </v-col>

      <v-col cols="6">
        <AppTextField label="Password" type="password" name="password" />
      </v-col>
      <v-col cols="6">
        <AppTextField
          label="Confirm Password"
          type="password"
          name="password_confirmation"
        />
      </v-col>
    </v-row>
  </v-card-text>
</template>
