import Api from "./Api";

export default {
  updated() {
    return Api().set("/persona");
  }
};