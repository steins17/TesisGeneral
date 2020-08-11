import Api from "./Api";

export default {
  enviarletras(form) {
    return Api().post("/nivel3/letras/respuestas", form);
  },
  enviarsilabas(form) {
    return Api().post("/nivel3/silabas/respuestas", form);
  },
  enviaroraciones(form) {
    return Api().post("/nivel3/palabras/respuestas", form);
  },
};
