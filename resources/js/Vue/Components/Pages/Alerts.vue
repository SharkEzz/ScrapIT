<template>
    <div>
        <div class="row">
            <h3>Alertes reçues</h3>
        </div>
        <div class="row">
            <table class="table table-striped table-responsive-sm mt-3" v-if="loaded">
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
                v-else
                :rows="4"
                :columns="4"
                :table-props="{ striped: true }"
            ></b-skeleton-table>
        </div>
    </div>
</template>

<script>
import { BButton, BSkeletonTable, BModal, BForm, BFormGroup, BFormInput  } from 'bootstrap-vue';
import alertService from "../../Services/Fetch/alertService";

export default {
    name: 'Alerts',
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
            alerts: [],
            loaded: false,
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
        }
    }
}
</script>
