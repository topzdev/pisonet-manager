import { FetchResult } from "node_modules/nuxt/dist/app/composables/fetch";
import { FetchError, FetchOptions } from "node_modules/ofetch";

import {
  AsyncDataOptions,
  _Transform,
  KeyOfRes,
  AsyncData,
  PickFrom,
} from "node_modules/nuxt/dist/app/composables/asyncData";
import {
  TypedInternalResponse,
  NitroFetchRequest,
} from "node_modules/nitropack";
import { RuntimeConfig } from "node_modules/@nuxt/schema/dist/index";

type UseFetchParams = Parameters<typeof useFetch>;
export type UseFetchEndpoint = UseFetchParams[0];

export type UseFetchOptions = FetchOptions & {
  lazy?: boolean;
};

export { FetchError };

// type UseFetch = <ResT = void, ErrorT = FetchError, ReqT extends NitroFetchRequest = NitroFetchRequest, _ResT = ResT extends void ? FetchResult<ReqT> : ResT, Transform extends (res: _ResT) => any = (res: _ResT) => _ResT, PickKeys extends KeyOfRes<Transform> = KeyOfRes<Transform>> (equest: Ref<ReqT> | ReqT | (() => ReqT), opts?: UseFetchOptions<_ResT, Transform, PickKeys>): AsyncData<PickFrom<ReturnType<Transform>, PickKeys>, ErrorT | null)
