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
  guardar_s(form) { 
    return Api().post("/nivel2/guardar_s", form); 
  },
  guardar_oraciones(form) { 
    return Api().post("/nivel2/guardar_oraciones", form); 
  },
  editar_l(form){ 
    return Api().post("/nivel2/editar_l", form); 
  },
  editar_s(form){ 
    return Api().post("/nivel2/editar_s", form); 
  },
  editar_o(form){ 
    return Api().post("/nivel2/editar_o", form);
  },
  eliminar_letras(id){
    return Api().delete("/nivel2/eliminar_letras/"+id);
  },
  eliminar_silabas(id){ 
    return Api().delete("/nivel2/eliminar_silabas/"+id); 
  },
  eliminar_oraciones(id){ 
    return Api().delete("/nivel2/eliminar_oraciones/"+id); 
  },
  cambiar_estado(form){ 
    return Api().post("/nivel2/cambiar_estado", form); 
  }
}
