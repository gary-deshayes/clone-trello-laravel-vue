import { shallowMount } from '@vue/test-utils';
import router from "@/router";
import ListeDashboard from '@/components/ListeDashboard.vue';
import store from '../../../src/store'

describe('ListeDashboard.vue', () => {
  it('Vérifie si les dashboards s\'affiche.', async () => {
    
    const wrapper = shallowMount(ListeDashboard,{
        stubs: ['router-link'],
        global: {
          plugins: [store, router]
        }
      });
    //   await store.dispatch('loadDashboards')
    console.log(store.state.dashboards);
    console.log(wrapper.vm.dashboards);
    console.log(store.state.dashboards);
  });
});
