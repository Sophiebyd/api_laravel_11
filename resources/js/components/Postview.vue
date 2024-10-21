<template>
    <div class="container mt-5">
        <div v-if="userStore.posts.length === 0" class="text-center">
            <p>No posts available.</p>
        </div>
        <div v-for="post in userStore.posts" :key="post.id" class="card mb-4" style="width: 30rem; margin: 0 auto;">
            <img src="../../../public/img/defaut_background.png" class="card-img-top" alt="default">
            <div class="card-body">
                <p class="card-text">{{ post.text }}</p>
                <div v-if="userStore.id" class="d-flex justify-content-center">
                    <a href="#" class="btn btn-secondary mx-2">Commenter</a>
                    <a href="#" class="btn btn-primary mx-2">Modifier</a>
                    <a href="#" class="btn btn-danger mx-2">Supprimer</a>
                </div>
                <div v-else class="d-flex justify-content-center">
                    <a href="#" class="btn btn-secondary mx-2">Commenter</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useUserStore } from '../../stores/user';
const userStore = useUserStore();
console.log(userStore.posts); 
</script>
