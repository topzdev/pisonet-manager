import dayjs from "dayjs";
import { CoinsOut } from "~~/types/CoinsOut";

export default function useElectricityInfo(
  coinsOut: Pick<CoinsOut, "electricity_charge" | "start_date">
) {
  const totalCharge =
    coinsOut.electricity_charge.kwh_charge * coinsOut.electricity_charge.kwh;

  // TODO: fill this with real data
  const installment = 4;

  return {
    toPay: moneyFormatter().format(totalCharge / installment),
    month: dayjs(coinsOut.start_date).format("MMMM, YYYY"),
    installment,
    totalCharge: moneyFormatter().format(totalCharge),
  };

  return {};
}
