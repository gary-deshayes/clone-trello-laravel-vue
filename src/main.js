import { createApp } from 'vue';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import App from './App.vue';
import router from './router';
import store from './store';
if (window.Cypress) {
    window.__store__ = store
  }
const app = createApp(App)
app.use(store).use(router);
const $toast = useToast();
app.mount('#app')
