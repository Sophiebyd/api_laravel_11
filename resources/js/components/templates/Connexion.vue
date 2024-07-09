<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <form>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="text" class="form-control" id="inputPseudo" placeholder="Pseudo" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
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
