<template>
    <div>
        <div class="row justify-content-between">
            <h3>Alertes reçues</h3>
            <button class="btn btn-info" @click="refresh">Actualiser</button>
        </div>
        <div class="row mt-3 no-gutters">
            <div class="card col-12">
                <div class="card-body">
                    <b-alert
                        :show="showAlert"
                        dismissible
                        variant="success"
                        class="text-center w-100"
                        @dismissed="showAlert = false"
                    >
                        Liste actualisée !
                    </b-alert>
                    <table class="table table-striped table-responsive-sm mt-3" v-if="loaded && alerts.length > 0">
                        <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Date / Heure</th>
                            <th>Prix trouvé</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="alert in alerts">
                            <td>{{ alert.product.name }}</td>
                            <td>{{ alert.date }}</td>
                            <td>
                                <span class="badge badge-info">{{ alert.price }} €</span>
                            </td>
                            <td>
                                <a target="_blank" :href="alert.product.url" class="btn btn-sm btn-success">Consulter</a>
                                <b-button variant="danger" size="sm" @click="remove(alert.id)">Supprimer</b-button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <b-skeleton-table
                        v-else-if="!loaded"
                        :rows="4"
                        :columns="4"
                        :table-props="{ striped: true }"
                    ></b-skeleton-table>
                    <div class="alert alert-info mt-3 w-100 text-center" v-else><b>Aucune alerte pour le moment...</b></div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import {
    BButton,
    BSkeletonTable,
    BModal,
    BForm,
    BFormGroup,
    BFormInput,
    BAlert,
    BProgress
} from 'bootstrap-vue';
import alertService from "../../../Services/Fetch/alertService";

export default {
    name: 'Alerts',
    components: {
        BButton,
        BSkeletonTable,
        BModal,
        BForm,
        BFormGroup,
        BFormInput,
        BAlert,
        BProgress
    },
    data() {
        return {
            alerts: [],
            loaded: false,
            showAlert: false
        }
    },
    beforeMount() {
        this.fetchAll();
    },
    methods: {
        fetchAll()
        {
            alertService.getAll()
                .then(alerts => {
                    this.alerts = alerts;
                    this.loaded = true;
                })
        },
        remove(id)
        {
            if(!confirm('Supprimer cette alerte ?'))
                return;

            alertService.remove(id)
                .then(() => {
                    this.fetchAll();
                })
        },
        refresh()
        {
            alertService.getAll()
                .then(alerts => {
                    this.alerts = alerts;
                    this.showAlert = true;
                })
        }
    }
}
</script>
