export type SnackbarConfig = {
  show: boolean;
  message: string;
  color: "success" | "error" | "primary" | string;
  timeout?: number;
};
