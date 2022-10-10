<template>
    <div class="card card-hover box has-border my-1" @click="$emit('openCard')">
      <h3
        class="text-1xl font-bold"
        data-bs-toggle="popover"
        data-bs-placement="top"
        data-bs-content="Top popover"
      >
        {{ card.title }}
      </h3>
    </div>
  </template>

<script setup>
import { toRefs, defineProps } from 'vue';

const props = defineProps({
    card: Object
})
let { card } = toRefs(props)

</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.card-hover:hover {
  cursor: pointer;
  background-color: hsl(0, 0%, 96%) !important;

    h2 {
        font-weight: bold;
    }
}
    .has-border {
        border: solid 1px black;
    }
.logo {
    height: 64px;
    width: 64px;
}

.card-dashboard {
    border: solid 1px black;
    cursor: pointer;
}

.card-dashboard:hover {
    background-color: hsl(0, 0%, 96%) !important;

    h2 {
        font-weight: bold;
    }
}
</style>
