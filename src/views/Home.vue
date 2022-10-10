<template>
  <div class="home">
    <ListeDashboard />
  </div>
</template>

<script>
// @ is an alias to /src
import ListeDashboard from '@/components/ListeDashboard.vue';

export default {
  name: 'Home',
  components: {
    ListeDashboard,
  },
};
</script>
