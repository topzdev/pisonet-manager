export const pageRoutes = {
  dashboard: (() => {
    const parentPath = "/dashboard";

    return {
      title: "Dashboard",
      to: parentPath,
      icon: "mdi-view-dashboard-outline",
      exact: true,
    };
  })(),

  sales: (() => {
    const parentPath = "/sales";

    return {
      title: "Sales",
      to: parentPath,
      icon: "mdi-chart-line",
      exact: true,

      subpages: {
        create: (() => {
          const subPath = `${parentPath}/create`;
          return {
            title: "Add Coins Out",
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

  shareholders: (() => {
    const parentPath = "/shareholders";

    return {
      title: "Shareholders",
      to: parentPath,
      icon: "mdi-account-group-outline",
      exact: true,

      subpages: {
        create: (() => {
          const subPath = `${parentPath}/create`;

          return {
            title: "Add Shareholder",
            to: subPath,
          };
        })(),
      },
    };
  })(),

  settings: (() => {
    const parentPath = "/settings";

    return {
      title: "Settings",
      to: parentPath,
      icon: "mdi-cog-outline",
      exact: true,
    };
  })(),
};
