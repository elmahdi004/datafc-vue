import { createStore } from "vuex";
import api from "./axios";
const store = createStore({
    state() {
        return {
            auth: null,
            programme: [],
        };
    },
    mutations: {
        setUser(state, user) {
            state.auth = user;
        }
    },
    actions: {
        async fetchUser({ commit }) {
            try {
                const {data} = await api.get('/user'); 
                console.log('user from store',data);
                commit('setUser', data); 
            } catch (error) {
                console.error("Error fetching user:", error);
            }
        }
    },
    getters: {},
});

export default store;
