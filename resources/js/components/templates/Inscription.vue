<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <form @submit.prevent="inscription">
                <p v-if="errorMessage != ''" class="text-white bg-danger w-50 p-3 mx-auto">{{ errorMessage }}</p>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="text" class="form-control" id="inputPseudo" placeholder="Pseudo" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            Doit contenir au moins une majuscule, un caractère spécial, un chiffre
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2">Inscription</button>
                        <button @click="$router.push('/')" class="btn btn-danger">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const pseudo = ref('');
const email = ref('');
const password = ref('');
const errorMessage = ref('')

const inscription = () => {
    axios.post('/inscription', {
        pseudo: pseudo.value,
        email: email.value,
        password: password.value
    })
    .then(response => {
        console.log(response);
        $router.push('/connexion');
    })
    .catch(error => {
        console.error(`Inscription non réussie`, error);
        errorMessage.value = "Une erreur est survenue lors de l'inscription.";
    });
}
</script>