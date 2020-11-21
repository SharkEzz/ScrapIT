<template>
  <div>
      <div class="row justify-content-between">
          <h3>Mes produits</h3>
          <b-button variant="success" @click="loadModal">Ajouter</b-button>
      </div>
      <div class="row">
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

      <b-modal hide-footer="" v-model="showAdd" id="addModal" title="Ajouter un produit">
          <b-form @submit.prevent="onSubmit">
              <b-form-group
                  label="Nom du produit"
                  label-for="name"
              >
                  <b-form-input id="name" v-model="form.name" required></b-form-input>
              </b-form-group>
              <b-form-group
                  label="Description"
                  label-for="description"
              >
                  <b-form-input id="description" v-model="form.description"></b-form-input>
              </b-form-group>
              <b-form-group
                  label="URL"
                  label-for="url"
              >
                  <b-form-input id="url" v-model="form.url" required></b-form-input>
              </b-form-group>
              <b-form-group
                  label="Seuil de prix"
                  label-for="price"
              >
                  <b-form-input type="number" id="price" v-model="form.price" required></b-form-input>
              </b-form-group>
              <b-form-group
                  label="Scraper"
                  label-for="scraper_id"
              >
                  <b-form-select id="scraper_id" v-model="form.scraper_id" :options="scrapers" required></b-form-select>
              </b-form-group>
              <hr>
              <div class="text-right">
                  <b-button type="button" variant="secondary" @click="showAdd = false">Fermer</b-button>
                  <b-button type="submit" variant="success">Valider</b-button>
              </div>
          </b-form>
      </b-modal>
  </div>
</template>

<script>
import productService from "../../../Services/Fetch/productService";
import scraperService from "../../../Services/Fetch/scraperService";

import { BButton, BModal, BForm, BFormGroup, BFormInput, BFormSelect } from 'bootstrap-vue';

export default {
  name: 'Products',
  components: {
      BButton,
      BModal,
      BForm,
      BFormGroup,
      BFormInput,
      BFormSelect
  },
  data() {
    return {
        products: [],
        loaded: false,
        showAdd: false,
        form: {
            name: '',
            description: '',
            url: '',
            price: null,
            scraper_id: null
        },
        scrapers: null
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
          if(!confirm('Supprimer ce produit ?'))
              return ;

          productService.remove(id)
              .then(() => this.fetchProducts());
      },
      onSubmit()
      {
          productService.add(this.form)
            .then(() => this.fetchProducts());
      },
      loadModal()
      {
          if(this.scrapers !== null)
          {
              this.showAdd = !this.showAdd;
              return ;
          }

          scraperService.getAll()
            .then(scrapers => {
                this.scrapers = scrapers.map(scraper => {
                    return {
                        value: scraper.id,
                        text: scraper.name
                    }
                });
                this.showAdd = !this.showAdd;
            })
      }
  }
}
</script>
