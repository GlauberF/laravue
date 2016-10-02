import Vue from 'vue';
import HelloInjector from '!!vue?inject!components/Hello';

// eslint-disable-next-line new-cap
const Hello = HelloInjector({
  '../mixins/injectors': {
    props: {
      routeHasLogin: {
        default() {
          return '';
        },
      },
      baseUrl: {
        default() {
          return 'http://localhost';
        },
      },
    },
  },
});

describe('Hello.vue', () => {
  it('should render correct contents', () => {
    const vm = new Vue({
      template: '<div><hello></hello></div>',
      components: { Hello },
    }).$mount();

    expect(vm.$el.querySelector('.title').textContent).to.contain('Laravue');
  });
});
