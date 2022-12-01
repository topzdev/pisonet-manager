import { factories } from "@/plugins/api";

declare module "#app" {
  interface NuxtApp {
    $api: typeof factories;
  }
}
declare module "@vue/runtime-core" {
  interface ComponentCustomProperties {
    $api: typeof factories;
  }
}
