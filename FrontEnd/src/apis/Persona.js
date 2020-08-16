import Api from "./Api";

export default {
  recuperar(form) {
    return Api().post("/perfil", form);
  },
  updated(form) {
    return Api().get("/perfil", form );
  }
};