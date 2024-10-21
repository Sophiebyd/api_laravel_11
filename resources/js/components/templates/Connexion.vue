<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <h1 class="text-center mb-5">Connexion</h1>
            <form @submit.prevent="connexion">
                <p v-if="errorMessage != ''" class="text-white bg-danger w-50 p-3 mx-auto">{{ errorMessage }}</p>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email" ref="email"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password"
                            ref="password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2">Connexion</button>
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
import { useRouter } from 'vue-router';
import { useUserStore } from '../../../stores/user.js'

const email = ref('');
const password = ref('');
const errorMessage = ref('');
const $router = useRouter();
const userStore = useUserStore();

const connexion = () => {
    axios.get('/sanctum/csrf-cookie')
        .then(response => {
            axios.post('/api/login', {
                email: email.value.value,
                password: password.value.value,
            })
                .then(async (response) => {
                    if (response.data.errors) {
                        errorMessage.value = response.data.errors;
                    } else {
                        console.log(response);
                        userStore.setUser(response.data[0]);
                        /**
                         const posts = await axios.get('api/post');
                         userStore.setPosts(posts);
                         */
                        $router.push('/');
                    }
                })
                .catch(error => {
                    alert(`Connexion échouée`, error);
                    errorMessage.value = "Une erreur est survenue lors de la connexion.";
                });
        })
        .catch(error => {
            alert(`Connexion échouée`, error);
            errorMessage.value = "Une erreur est survenue lors de la connexion.";
        })
}
</script>