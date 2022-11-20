import { PropType } from "nuxt/dist/app/compat/capi";

export const inputProps = {
  label: {
    required: true,
    type: String,
  },
  color: {
    default: "primary",
    type: String,
  },
  variant: {
    default: "filled",
    type: String as PropType<
      "filled" | "outlined" | "plain" | "underlined" | "solo" | undefined
    >,
  },
  modelValue: {
    type: [String, Number] as PropType<any>,
  },
  hideDetails: {
    default: "auto",
    type: [String, Boolean] as PropType<boolean | "auto">,
  },
};

export const textareaProps = {
  rows: {
    default: 3,
    type: [String, Number],
  },
};
