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
  guardar(form) {
    return Api().post("/nivel4/guardar", form);
  },

  agregar(form){
    return Api().post("/nivel4/agregar", form)
  },
  editar(form){
    return Api().post("/nivel4/editar", form)
  },
  eliminar(form){
    return Api().delete("/nivel4/eliminar", form)
  }
};