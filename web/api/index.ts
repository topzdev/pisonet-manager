import { RuntimeConfig } from "node_modules/@nuxt/schema/dist/index";
import { UseFetchEndpoint, UseFetchOptions } from "~~/types/NuxtTypes";

export type ApiConfig = {
  config: RuntimeConfig;
};

export type ApiTypes = {
  index: typeof IndexApi;
};

export class ManageApi {
  apiFullPath: string;
  config: ApiConfig["config"];
  headers = {
    json: {
      "Content-Type": "Application/json",
      Accept: "Application/json",
    },
  };

  constructor({ config }: ApiConfig, routeName: string) {
    this.config = config;
    this.apiFullPath = `${this.config.public.apiBaseUrl}/${routeName}`;
  }

  get<ReturnType = void, ErrorType = void>(
    request: UseFetchEndpoint,
    opts?: UseFetchOptions
  ) {
    const headers = opts?.headers ? opts.headers : this.headers.json;

    return useFetch<ReturnType, ErrorType>(`${this.apiFullPath}${request}`, {
      ...opts,
      headers,
      method: "GET",
    });
  }

  post<ReturnType = void, ErrorType = void>(
    request: UseFetchEndpoint,
    opts?: UseFetchOptions
  ) {
    const headers = opts?.headers ? opts.headers : this.headers.json;

    return useFetch<ReturnType, ErrorType>(`${this.apiFullPath}${request}`, {
      ...opts,
      headers,
      method: "POST",
    });
  }

  put<ReturnType = void, ErrorType = void>(
    request: UseFetchEndpoint,
    opts?: UseFetchOptions
  ) {
    const headers = opts?.headers ? opts.headers : this.headers.json;

    return useFetch<ReturnType, ErrorType>(`${this.apiFullPath}${request}`, {
      ...opts,
      headers,
      method: "PUT",
    });
  }

  delete<ReturnType = void, ErrorType = void>(
    request: UseFetchEndpoint,
    opts?: UseFetchOptions
  ) {
    const headers = opts?.headers ? opts.headers : this.headers.json;

    return useFetch<ReturnType, ErrorType>(`${this.apiFullPath}${request}`, {
      ...opts,
      headers,
      method: "DELETE",
    });
  }
}

export default class IndexApi extends ManageApi {
  helloWorld() {
    return useFetch(`${this.config.public.apiBaseUrl}/api`, {
      headers: this.headers.json,
    });
  }
}
