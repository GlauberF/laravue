const injectorsObj = {};

// eslint-disable-next-line no-undef
Object.keys(window.injectors).forEach((injector) => {
  injectorsObj[injector] = {
    default() {
      // eslint-disable-next-line no-undef
      return window.injectors[injector];
    },
  };
});

export default {
  props: injectorsObj,
};
