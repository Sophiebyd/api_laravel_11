<template>
    <div id="container">
        <Header />
        <main class="my-4 mx-2">
            <!-- si la route est différente de / (racine du site) -->
            <!-- on affiche le template du composant concerné par la route -->
            <div v-if="$route.path !== '/'">
                <router-view v-bind:key="$route.fullPath"></router-view>
            </div>

            <!-- si la route est / => on affiche le code de l'accueil-->
            <div v-else class="text-center">
                <i class="my-2 fa-5x fa-solid fa-paper-plane rounded-circle p-5"></i>
                <h1 class="text-center fw-bold">Réseau Social Laravel VueJS</h1>
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
</script>

<style scoped></style>