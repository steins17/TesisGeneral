import Vue from 'vue';
import Vuex from 'vuex';
import Api from "../apis/Persona";
import User from "../apis/User";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        nota: 20,
        user:null,
        verfoto:null,
    },

    actions: {
        recuperanota({ commit }) {
            if(localStorage.getItem("token")){
                return Api.notas().then( ({data}) => { 
                    return data;
                });
            }else{
                return 0;
            }
        },

        recuperauser({ commit }) {
            return User.auth().then(({data}) => {
                return data;
            }).catch(error => {
                if (error.response.status === 401) {
                    localStorage.removeItem("token");
                    console.log("debes iniciar sesión");
                }else if (error.response.status === 500) {
                    localStorage.removeItem("token");
                    console.log("debes iniciar sesión");
                }else{
                    localStorage.removeItem("token");
                    console.log("debes iniciar sesión");
                    location.reload();
                }
            });
        }
    }
})


