import Api from "./Api";

export default {
  enviarletras(form) {
    return Api().post("/nivel2/letras/respuesta", form);
  },
  enviarsilabas(form) {
    return Api().post("/nivel2/silabas/respuesta", form);
  },
  enviaroraciones(form) {
    return Api().post("/nivel2/oraciones/respuesta", form);
  },
  llamarpreguntas() {
    return Api().get("/nivel2/llamardatos");
  },
};
