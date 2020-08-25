import Api from "./Api";

export default {
  enviarletras(form) {
    return Api().post("/Nivel3/letras/respuesta", form);
  },
  enviarsilabas(form) {
    return Api().post("/nivel3/silabas/respuesta", form);
  },
  enviaroraciones(form) {
    return Api().post("/nivel3/palabras/respuesta", form);
  },

  llamarpreguntas() {
    return Api().get("/nivel3/llamardatos");
  },
};
