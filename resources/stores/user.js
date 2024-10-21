import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
    //contient les informations utilisateurs
    state: () => {
        return {
            email: null,
            pseudo: null,
            picture: null,
            id: null,
            role: null,
            posts: [],
            comments: [],
        }
    },
    // modifie les valeurs du state
    actions: {
        setUser(user) {
            this.email = user.email;
            this.pseudo = user.pseudo;
            this.picture = user.image;
            this.id = user.id;
            this.role = user.role;
        },
        setPosts(posts) {
            posts.sort((a, b) => new Date(b.date) - new Date(a.date));
            this.posts = posts;
        },
    }
})