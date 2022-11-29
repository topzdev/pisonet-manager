export const required = (v: any) => !!v || "This field is required";
export const email = (v: any) =>
  !!String(v)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    ) || "Must be valid email";

export const alphanumspecial = (v: any) =>
  !!/^[ A-Za-z0-9_@./#&+-]*$/.test(v) ||
  "Must contain alpha numeric with special characters";
