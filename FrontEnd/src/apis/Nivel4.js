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
  llamarresultados() {
    return Api().get("/nivel4/llamarresultados");
  },
  //administrador
  listar() {
    return Api().get("/nivel4/listar");
  },
  guardar_oraciones(form) {
    return Api().post("/nivel4/guardar_oraciones", form);
  },
  guardar_frases(form) {
    return Api().post("/nivel4/guardar_frases", form);
  },
  editar_oraciones(form){
    return Api().post("/nivel4/editar_oraciones", form);
  },
  editar_frases(form){
    return Api().post("/nivel4/editar_frases", form);
  },
  eliminar_oraciones(id){
    return Api().delete("/nivel4/eliminar_oraciones/"+id);
  },
  eliminar_frases(id){
    return Api().delete("/nivel4/eliminar_frases/"+id);
  },
  cambiar_estado(form){
    return Api().post("/nivel4/cambiar_estado", form);
  }
}