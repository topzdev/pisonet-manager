type DataTimestamp = {
  created_at: string;
  updated_at: string;
  deleted_at: null;
};

type ApiError = {
  message: string;
  errors: Record<"string", string[]>;
};
