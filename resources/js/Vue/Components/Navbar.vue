<template>
  <b-navbar toggleable="lg" type="dark" variant="dark">
    <b-navbar-brand to="/">ScrapIT</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav v-if="this.$store.state.loggedIn">
      <b-navbar-nav>
        <b-nav-item to="/">Accueil</b-nav-item>
        <b-nav-item :to="{name: 'products'}">Mes produits</b-nav-item>
        <b-nav-item :to="{name: 'alerts'}">Mes alertes</b-nav-item>
        <b-nav-item :to="{name: 'scrapers'}">Scrapers</b-nav-item>
      </b-navbar-nav>

      <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right :text="this.$store.state.username">
              <b-dropdown-item :to="{name: 'configuration'}" disabled="">Configuration</b-dropdown-item>
              <b-dropdown-item href="#" @click="handleLogoutClick">Déconnexion</b-dropdown-item>
          </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
import { BNavbar, BNavbarBrand, BNavbarToggle, BCollapse, BNavbarNav, BNavItem, BNavItemDropdown, BDropdownItem } from 'bootstrap-vue';
import logout from "../../Services/Security/logout";

export default {
    name: 'Navbar',
    components: {
        BNavbar,
        BNavbarBrand,
        BNavbarToggle,
        BCollapse,
        BNavbarNav,
        BNavItem,
        BNavItemDropdown,
        BDropdownItem,
    },
    methods: {
        handleLogoutClick()
        {
            logout().then(() => {
                if(!this.$store.state.loggedIn)
                    this.$router.push({name: 'login'});
            });
        }
    }
}
</script>
