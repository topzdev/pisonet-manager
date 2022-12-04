export type Shareholder = {
  id: number;
  shop_id?: number;
  percentage: number;
  username: string;
  firstname: string;
  lastname: string;
  email: string;
  color: string | null;
  initials: string;
} & DataTimestamp;

export type CreateShareholder = {
  password: string;
  confirmPassword: string;
} & Pick<
  Shareholder,
  | "shop_id"
  | "percentage"
  | "firstname"
  | "lastname"
  | "username"
  | "email"
  | "color"
>;

export type UpdateShareholder = Pick<
  Shareholder,
  | "shop_id"
  | "percentage"
  | "firstname"
  | "lastname"
  | "username"
  | "email"
  | "color"
>;
