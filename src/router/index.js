import {
  createRouter,
  createWebHashHistory
} from 'vue-router';
import Home from '../views/Home.vue';
import Dashboard from '../components/Dashboard';

const routes = [{
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: "/dashboard/:id",
    component: Dashboard
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
