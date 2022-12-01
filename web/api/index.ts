import { RuntimeConfig } from "node_modules/@nuxt/schema/dist/index";

type UseFetchParams = Parameters<typeof useFetch>;
type UseFetchOptions = UseFetchParams[1];
type UseFetchEndpoint = UseFetchParams[0];

export type ApiConfig = {
  config: RuntimeConfig;
};

export type ApiTypes = {
  index: typeof IndexApi;
};

export class ManageApi {
  config: ApiConfig["config"];
  headers = {
    json: {
      "Content-Type": "Application/json",
      Accept: "Application/json",
    },
  };

  constructor({ config }: ApiConfig) {
    this.config = config;
  }
}

export default class IndexApi extends ManageApi {
  helloWorld() {
    return useFetch(`${this.config.public.apiBaseUrl}/api`, {
      headers: this.headers.json,
    });
  }
}
