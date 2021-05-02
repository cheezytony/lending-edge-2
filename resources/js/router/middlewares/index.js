export default {
  router: null,
  middlewares: {
    auth() {
      return true;
    },
    guest() {
      return true;
    },
  },

  init(router) {
    this.router = router;
    this.router.beforeEach((destinationRoute, referrer, next) => {
      const { meta: { middlewares = [] } } = destinationRoute;
      let routeIsOkay = true;

      middlewares.forEach((middlewareName) => {
        routeIsOkay = routeIsOkay
          ? this.runMiddleware(middlewareName, destinationRoute, referrer, next) === true
          : false;
      });

      if (routeIsOkay) {
        next();
      }
    });
  },
  runMiddleware(middlewareName, ...args) {
    const middleware = this.middlewares[middlewareName];
    if (!middleware) {
      throw new Error(`Unable to find middleware '${middlewareName}'`);
    }

    return middleware.apply(this.router.app, args);
  },
};
