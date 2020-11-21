<template>
  <div>
    <Navbar />
    <b-container class="mt-3">
      <router-view></router-view>
    </b-container>
  </div>
</template>

<script>
import Navbar from "./Components/Navbar";
import { BContainer } from 'bootstrap-vue';

export default {
  name: 'App',
  components: {
    Navbar,
    BContainer
  }
}
</script>