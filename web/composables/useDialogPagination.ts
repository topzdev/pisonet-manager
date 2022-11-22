type DialogPaginationParams = {
  maxPart: number;
  startPart: number;
  open: boolean;
  exit: Function;
  final: Function;
};

export default function ({
  startPart = 1,
  maxPart,
  open,
  exit,
  final,
}: DialogPaginationParams) {
  const router = useRouter();
  const dialog = ref(open);
  const part = ref(startPart);

  const onPaginate = (type: "back" | "next") => {
    if (type === "next") {
      part.value++;
    } else {
      part.value--;
    }

    if (part.value <= 0) {
      dialog.value = false;
      part.value = 1;

      if (exit) exit();
    }

    if (part.value > maxPart) {
      dialog.value = false;
      part.value = maxPart;

      if (final) final();
    }
  };

  const closeLabel = computed(function () {
    if (part.value <= 1) {
      return "Close";
    } else {
      return "Back";
    }
  });

  return { closeLabel, onPaginate, dialog, part };
}
