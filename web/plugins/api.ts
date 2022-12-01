import IndexApi from "@/api/index";
import ShareholderApi from "@/api/shareholder";

export default defineNuxtPlugin((nuxtApp) => {
  const runtimeConfig = useRuntimeConfig();

  const apiConfigs = {
    config: runtimeConfig,
  };

  const factories = {
    index: new IndexApi(apiConfigs),
    shareholder: new ShareholderApi(apiConfigs),
  };

  return {
    provide: {
      api: factories,
    },
  };
});
