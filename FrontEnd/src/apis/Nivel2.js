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
  llamarresultados() {
    return Api().get("/nivel2/llamarresultados");
  },
  //administardor
  listar() {
    return Api().get("/nivel2/listar");
  },
  guardar(form) {
    return Api().post("/nivel2/guardar", form);
  },
  agregar(form){
    return Api().post("/nivel2/agregar", form)
  },
  editar(form){
    return Api().post("/nivel2/editar", form)
  },
  eliminar(form){
    return Api().delete("/nivel2/eliminar", form)
  }
};
