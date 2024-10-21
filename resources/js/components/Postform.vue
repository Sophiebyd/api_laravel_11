<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <textarea v-model="postText" class="form-control" placeholder="Écrivez votre message ici..." rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" @click="submitPost">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

import { useUserStore } from '../../stores/user';
const userStore = useUserStore();

const postText = ref('');
const postImage = ref(null);

const submitPost = () => {
    axios.post('/api/posts/')
        .then(response => {

            alert(response.data.message);
        })
        .catch(error => {
            alert(`Echec evoie du post`, error);
            console.log(error);
            
        })
}

</script>