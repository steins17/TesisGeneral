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
  editar_s(form){
    return Api().post("/nivel3/editar_s", form)
  },
  editar_l(form){
    return Api().post("/nivel3/editar_l", form)
  },
  editar_p(form){
    return Api().post("/nivel3/editar_p", form)
  },
  eliminar_letras(id){
    return Api().delete("/nivel3/eliminar_letras/"+id);
  },
  eliminar_silabas(id){
    return Api().delete("/nivel3/eliminar_silabas/"+id);
  },
  eliminar_palabras(id){
    return Api().delete("/nivel3/eliminar_palabras/"+id);
  },
  cambiar_estado(form){
    return Api().post("/nivel3/cambiar_estado", form);
  }
};
