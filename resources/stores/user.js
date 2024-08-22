import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
    //contient les informations utilisateurs
    state: () => {
        return {
            email: null,
            pseudo: null,
            picture: null,
        }
    },
    // récupère les infos du state
    getters: {
        getUser: ({ email, pseudo, picture }) => ({ email, pseudo, picture })
    },
    // modifie les valeurs du state
    actions: {
        setUser(user) {
            this.email = user.email;
            this.pseudo = user.pseudo;
            this.picture = user.image;
        }
    }
})