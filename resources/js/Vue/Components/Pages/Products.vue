<template>
  <div>
    <h3>Mes produits</h3>
    <table class="table table-striped table-responsive-sm mt-3">
      <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>URL</th>
        <th>Prix</th>
        <th>Scraper</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="product in products">
          <td>{{ product.name }}</td>
          <td>{{ product.description }}</td>
          <td><a class="badge badge-primary" target="_blank" :href="product.url">Ouvrir</a></td>
          <td>{{ product.price }} €</td>
          <td>{{ product.scraper.name }}</td>
          <td>
            <b-button variant="secondary" class="mb-md-0 mb-sm-2" size="sm">Editer</b-button>
            <b-button variant="danger" size="sm" @click="remove(product.id)">Supprimer</b-button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import productService from "../../Services/productService";

import { BButton } from 'bootstrap-vue';
import fetchProducts from "../../Services/Fetch/fetchProducts";

export default {
  name: 'Products',
  components: {
    BButton
  },
  data() {
    return {
      products: [],
      loaded: false
    }
  },
  beforeMount() {
    this.fetchProducts();
  },
  methods: {
    fetchProducts()
    {
      productService.getAll()
          .then(products => {
            this.products = products;
            this.loaded = true;
          })
    },
    remove(id)
    {
      productService.remove(id)
        .then(() => this.fetchProducts());
    }
  }
}
</script>
