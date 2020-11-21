<template>
    <div>
        <div class="row">
            <h3>Configuration</h3>
        </div>
        <div class="row justify-content-center">
            <div class="card col-md-5 col-sm-12">
                <div class="card-body">
                    <div class="card-title">Configuration mail</div>
                    <hr>
                    <b-form @submit.prevent="onSubmit">
                        <b-form-group
                            label="Hôte SMTP"
                            label-for="host"
                        >
                            <b-form-input id="host" v-model="form.host"></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Port SMTP"
                            label-for="port"
                        >
                            <b-form-input type="number" id="port" v-model="form.port"></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Utilisateur SMTP"
                            label-for="user"
                        >
                            <b-form-input id="user" v-model="form.user"></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Mot de passe SMTP"
                            label-for="pass"
                        >
                            <b-form-input type="password" id="pass" v-model="form.pass"></b-form-input>
                        </b-form-group>
                        <b-form-checkbox
                            v-model="form.secure"
                        >
                            Sécurisé ?
                        </b-form-checkbox>
                        <b-button type="submit" class="mt-3" variant="success">Valider</b-button>
                    </b-form>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
import { BForm, BFormGroup, BFormInput, BButton, BFormCheckbox } from 'bootstrap-vue';
import configService from "../../Services/Fetch/configService";

export default {
    name: 'Configuration',
    data() {
        return {
            form: {
                host: '',
                pass: '',
                port: null,
                user: '',
                secure: false
            }
        }
    },
    components: {
        BForm,
        BFormGroup,
        BFormInput,
        BButton,
        BFormCheckbox
    },
    beforeMount() {
        this.updateConfig();
    },
    methods: {
        updateConfig()
        {
            configService.getAll()
                .then(config => {
                    this.form.host = config.smtp_host;
                    this.form.port = config.smtp_port;
                    this.form.user = config.smtp_user;
                    this.form.secure = config.is_secure === 1;
                    this.form.pass = '';
                })
        },
        onSubmit()
        {
            configService.update(this.form)
                .then(() => {
                    this.updateConfig();
                })
        }
    }
}
</script>
