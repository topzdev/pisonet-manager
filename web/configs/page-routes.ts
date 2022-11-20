export const pageRoutes = {
  sales: (() => {
    const parentPath = "/sales";

    return {
      title: "Sales",
      to: parentPath,
      icon: "",
      exact: true,

      subpages: {
        create: (() => {
          const subPath = `${parentPath}/create`;
          return {
            title: "Create Coins Out",
            to: subPath,
          };
        })(),

        view: (id: number) => {
          return {
            title: "View Coins Out",
            to: `${parentPath}/${id}`,
          };
        },
      },
    };
  })(),
};
