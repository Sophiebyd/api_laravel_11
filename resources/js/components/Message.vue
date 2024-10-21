<template>
    <div class="card mt-5" style="width: 30rem; max-height: 25rem; margin: 0 auto;">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr v-for="(user, index) in users" :key="index">
                        <td>{{ user.pseudo }}</td>
                        <td>{{ user.message }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<script setup>
</script>