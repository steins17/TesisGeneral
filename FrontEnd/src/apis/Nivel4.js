import Api from "./Api";

export default {

  enviaroraciones(form) {
    return Api().post("/nivel4/palabras/respuesta", form);
  },

  enviarfrases(form) {
    return Api().post("/nivel4/palabras/respuesta", form);
  },

  llamardatos() {
    return Api().post("/nivel4/llamardatos");
  },
};