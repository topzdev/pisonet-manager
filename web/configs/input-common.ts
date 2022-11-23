import { Prop, PropType } from "nuxt/dist/app/compat/capi";

export const inputProps = {
  type: {
    default: "text",
  },
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
    type: [String, Number, Boolean, Array] as PropType<any>,
  },
  hideDetails: {
    default: "auto",
    type: [String, Boolean] as PropType<boolean | "auto">,
  },
  density: {
    type: String as PropType<any>,
  },
  suffix: {
    type: String,
  },
};

export const textareaProps = {
  rows: {
    default: 3,
    type: [String, Number],
  },
};
