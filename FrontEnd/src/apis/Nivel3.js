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

  llamardatos() {
    return Api().post("/nive3/llamardatos");
  },
};
