<template>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <router-link class="navbar-brand" to="/">Réseau social</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul v-if="!userStore.id" class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link active" aria-current="page" to="/">Accueil</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/inscription">Inscription</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/connexion">Connexion</router-link>
                        </li>
                    </ul>
                    <ul v-else class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link active" aria-current="page" to="/">Accueil</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" v-bind:to="`/profil/${userStore.id}`">Mon compte</router-link>
                        </li>
                        <li class="nav-item" @click="logout">
                            <span class="nav-link">Déconnexion</span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { useRouter } from 'vue-router';
const router = useRouter();

import { useUserStore } from '../../../stores/user';
const userStore = useUserStore();

const logout = () => {
    axios.post('/api/logout')
        .then(response => {
            alert(response.data.message);
            userStore.$reset();
            // supprimer les cookies csrf + de session
            document.cookie.split(";").forEach((c) => {
                document.cookie = c
                    .replace(/^ +/, "")
                    .replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
            });
            router.push('/');
        })
        .catch(error => {
            alert(`Echec de la déconnexion`, error);
            console.log(error);
            errorMessages.value = "Une erreur est survenue lors de la déconnexion"

        })
}
</script>