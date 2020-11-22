<template>
    <div>
        <div class="row justify-content-center no-gutters">
            <div class="card col-md-5 col-sm-12">
                <div class="card-body">
                    <h4 class="card-title text-center">Connexion</h4>
                    <hr>
                    <form action="#" method="post" @submit.prevent="onSubmit">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" class="form-control" name="email" v-model="form.email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password" class="form-control" v-model="form.password" required>
                        </div>
                        <div class="row no-gutters justify-content-center">
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import login, { checkIfLoggedIn } from "../../../Services/Security/loginGuard";

export default {
    name: 'Login',
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        onSubmit()
        {
            login(this.form.email, this.form.password).then(data => {
                if(data)
                {
                    this.$store.commit('login');
                    this.$store.commit('setUsername', data.user.name);
                    this.$router.push({name: 'index'});
                }
                else
                {
                    // TODO -> show alert message
                }
            });
        }
    }
}
</script>
