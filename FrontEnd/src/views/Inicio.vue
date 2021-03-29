<template>
  <div class="home col-8 mx-auto py-5 mt-5">
    <h1>Inicio</h1>
    <div class="card">
      <div class="card-body" v-if="user">
        <h3>Hola, bienvenido {{ user.name }}</h3>
      </div>
      <div class="card-body" v-else>
        <h3>Hola, bienvenido Usuario</h3>
      </div>
    </div>
    <div class="card mt-3" v-if="user">
        <vs-alert danger>
          <template #title>
            <h2>Forma de uso</h2>
          </template>
            <h4>Leer primero las "Formas de uso" antes de comenzar. </h4> 
            <h4>Una vez enviado la nota subir para acceder a la siguiente dinámica</h4>
        </vs-alert>
      </div>
  </div>
</template>
<script>
  import store from "../store/store";
  export default {
    data() {
      return {
        user:''
      }
    },
    methods: {
      usuario(){
        if(localStorage.getItem("token")){
          store.dispatch('recuperauser').then((value) => {
            this.user = value;
            if(this.user.foto) this.verfoto=true;
            this.loading("close");
          }).catch(error => {
              if(error.response){
                if (error.response.status === 401) {
                    localStorage.removeItem("token");
                    console.log("debes iniciar sesión"); 
                }else if (error.response.status === 500) {
                    localStorage.removeItem("token");
                    console.log("debes iniciar sesión");
                }else{
                    localStorage.removeItem("token");
                    console.log("debes iniciar sesión");
                    location.reload();
                }
              }
          });
        }
      },
    },
    mounted() {
      this.usuario();
    },
  }
</script>