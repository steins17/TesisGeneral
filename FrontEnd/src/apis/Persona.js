import Api from "./Api";

export default {
  recuperar(form) {
    return Api().get("/perfil", form); 
  },
  restablecer(form) { 
    return Api().post("/perfil", form ); 
  },
  imagen(form) { 
    return Api().post("/imagen", form ); 
  },
  password(form) { 
    return Api().post("/password", form ); 
  },
  notas() { 
    return Api().get("/notastotales"); 
  }
}
