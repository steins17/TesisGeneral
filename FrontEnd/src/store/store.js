import Vue from 'vue';
import Vuex from 'vuex';
import Api from "../apis/Persona";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        nota: 20,
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
        }
    }
});
