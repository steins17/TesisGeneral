import Api from "./Api";

export default {
  recuperar(form) {
    return Api().get("/perfil", form);
  },
  restablecer(form) {
    return Api().post("/perfil", form );
  }
};