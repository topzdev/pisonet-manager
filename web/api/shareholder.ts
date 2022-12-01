import { Shareholder } from "~~/types/CoinsOut";
import { ManageApi } from ".";

export default class ShareholderApi extends ManageApi {
  getAll(shopId: number = 2) {
    return useFetch<Shareholder[]>(
      `${this.config.public.apiBaseUrl}/shareholder/all/${shopId}`,
      {
        headers: this.headers.json,
      }
    );
  }
}
