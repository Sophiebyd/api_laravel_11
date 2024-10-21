<template>
    <div id="container">
        <Header />
        <main class="my-4 mx-2">
            <!-- si la route est différente de / (racine du site) -->
            <!-- on affiche le template du composant concerné par la route -->
            <div v-if="$route.path !== '/'">
                <router-view v-bind:key="$route.fullPath"></router-view>
            </div>

            <!-- si la route est / => on affiche le code de l'accueil -->
            <div v-else class="text-center">
                <i class="my-2 fa-5x fa-solid fa-paper-plane rounded-circle p-5"></i>
                <h1 class="text-center fw-bold">Réseau Social Laravel VueJS</h1>

                <!-- Afficher les posts -->
                <div class="d-flex justify-content-center">
                    <Postview />
                    <Message />
                </div>
    
                <!-- Afficher le formulaire de post si l'utilisateur est connecté -->
                <div v-if="userStore.id">
                    <Postform />
                </div>
            </div>
        </main>
        <Footer />
    </div>
</template>


<style scoped>
#container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
</style>

<script setup>
import Header from "./components/templates/Header.vue";
import Footer from "./components/templates/footer.vue";
import { useUserStore } from '../stores/user.js';
import Postform from "./components/Postform.vue";
import Postview from "./components/Postview.vue";
import Message from "./components/Message.vue";

const userStore = useUserStore();
console.log(userStore.getUser);
const posts = userStore.getPosts;
</script>

<style scoped></style>