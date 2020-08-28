import Api from "./Api";

export default {

  enviaroraciones(form) {
    return Api().post("/nivel4/oraciones/respuesta", form);
  },

  enviarfrases(form) {
    return Api().post("/nivel4/frases/respuesta", form);
  },

  llamarpreguntas() {
    return Api().get("/nivel4/llamardatos");
  },
};