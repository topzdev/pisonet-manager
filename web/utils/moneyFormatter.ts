export default function () {
  return Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "PHP",
  });
}
