export type Shareholder = {
  id: number;
  username: string;
  firstname: string;
  lastname: string;
  initials: string;
  color: string;
  percentage: number;
};

export type ElectricityCharge = {
  start_date: string;
  end_date: string;
  kwh: number;
  kwh_charge: number;
};

export type SavingFund = {
  description: string;
  created_date: string;
  percentage: number;
};

export type CoinsOutSale = {
  shareholder: 1;
  shareholder_percentage: 1;
  amount: number;
};

export type CoinsOutComputation = {
  saving_funds: number;
  total_sales: number;
  final_sales: number;
  total_deduction: number;
};

export type CoinsOutStatus = "ongoing" | "completed";

export type CoinsOut = {
  id: number;
  shop_id: number;
  saving_fund_id: number;
  electricity_charge_id: number;
  title: string;
  description: string;
  start_date: string;
  end_date: string;
  status: CoinsOutStatus;
  shareholders: Shareholder[];
  electricity_charge: ElectricityCharge;
  saving_fund: SavingFund;
  sales?: CoinsOutSale[] | null;
  computation?: CoinsOutComputation | null;
};

export type ShareholderSale = Shareholder & {
  electricity: number;
  savingFunds: number;
  totalDeductions: number;
  totalPayout: number;
  sales: number;
};
