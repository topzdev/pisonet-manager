import {
  Shareholder,
  CreateShareholder,
  UpdateShareholder,
} from "~~/types/Shareholder";
import { ApiConfig, ManageApi } from ".";

export default class ShareholderApi extends ManageApi {
  getOne(shareholder_id: number) {
    return this.get<Shareholder>(`/${shareholder_id}`);
  }

  getAll(shop_id: number) {
    return this.get<Shareholder[]>(`/all/${shop_id}`, {
      lazy: true,
    });
  }

  create(data: CreateShareholder) {
    return this.post<Shareholder>("", {
      body: data,
    });
  }

  update(data: UpdateShareholder) {
    return this.put<Boolean>(``, {
      body: data,
    });
  }

  destroy(shop_id: number) {
    return this.delete<Boolean>(`${shop_id}`);
  }
}
