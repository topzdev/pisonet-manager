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

            subpages: {
              final: {
                title: "Final",
                to: `${subPath}/final`,
              },
            },
          };
        })(),
      },
    };
  })(),
};
