import Api from "./Api";

export default {
  enviarletras(form) {
    return Api().post("/nivel3/letras/respuesta", form);
  },
  enviarsilabas(form) {
    return Api().post("/nivel3/silabas/respuesta", form);
  },
  enviarpalabras(form) {
    return Api().post("/nivel3/palabras/respuesta", form);
  },
  llamarpreguntas() {
    return Api().get("/nivel3/llamardatos");
  },
  llamarresultados() {
    return Api().get("/nivel3/llamarresultados");
  },
  //administardor
  listar() {
    return Api().get("/nivel3/listar");
  },
  guardar(form) {
    return Api().post("/nivel3/guardar", form);
  }
};
