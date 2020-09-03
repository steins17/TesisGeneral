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
  guardar_l(form) {
    return Api().post("/nivel3/guardar_l", form);
  },
  guardar_s(form) {
    return Api().post("/nivel3/guardar_s", form);
  },
  guardar_p(form) {
    return Api().post("/nivel3/guardar_p", form);
  },


  editar(form){
    return Api().post("/nivel3/editar", form)
  },
  eliminar(form){
    return Api().delete("/nivel3/eliminar", form)
  }
};
