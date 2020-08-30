import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import Vuesax from 'vuesax';
import store from './store/store';

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import 'vuesax/dist/vuesax.css';

Vue.use(Vuesax);
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");   