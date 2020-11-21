<template>
  <div>
    <div class="row justify-content-between">
      <h3>Mes produits</h3>
      <button class="btn btn-success" @click="showAdd = !showAdd">Ajouter</button>
    </div>
    <div class="row">
      <table class="table table-striped table-responsive-sm mt-3" v-if="loaded">
        <thead>
        <tr>
          <th>Nom</th>
          <th>Description</th>
          <th>ID du bloc</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="scraper in scrapers">
          <td>{{ scraper.name }}</td>
          <td>{{ scraper.description }}</td>
          <td>
            <span class="badge badge-info">{{ scraper.blockName }}</span>
          </td>
          <td>
            <b-button variant="secondary" class="mb-md-0 mb-sm-2" size="sm">Editer</b-button>
            <b-button variant="danger" size="sm" @click="remove(scraper.id)">Supprimer</b-button>
          </td>
        </tr>
        </tbody>
      </table>
      <b-skeleton-table
          v-else
          :rows="4"
          :columns="4"
          :table-props="{ striped: true }"
      ></b-skeleton-table>
    </div>

    <b-modal hide-footer="" v-model="showAdd" id="addModal" title="Ajouter un scraper">
      <b-form @submit.prevent="onSubmit">
        <b-form-group
            label="Nom du scraper"
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
            label="Nom du scraper"
            label-for="block"
        >
          <b-form-input id="block" v-model="form.blockName" required></b-form-input>
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
import { BButton, BSkeletonTable, BModal, BForm, BFormGroup, BFormInput  } from 'bootstrap-vue';
import scraperService from "../../Services/scraperService";

export default {
  name: 'Scrapers',
  components: {
    BButton,
    BSkeletonTable,
    BModal,
    BForm,
    BFormGroup,
    BFormInput
  },
  data() {
    return {
      scrapers: [],
      loaded: false,
      showAdd: false,
      form: {
        name: '',
        description: '',
        blockName: ''
      }
    }
  },
  beforeMount() {
    this.fetchAll();
  },
  methods: {
    fetchAll()
    {
      scraperService.getAll()
          .then(scrapers => {
            this.scrapers = scrapers;
            this.loaded = true;
          })
    },
    remove(id)
    {
      if(!confirm('Supprimer ce scraper ?'))
        return;

      scraperService.remove(id)
        .then(res => {
          if(res.ok)
          {
            this.fetchAll();
          }
          else
          {
            alert('Des produits appartiennent à ce scraper !')
          }
        })
    },
    onSubmit()
    {
      scraperService.add(this.form).then(() => {
        this.fetchAll();
        this.showAdd = false;
      });
    }
  }
}
</script>