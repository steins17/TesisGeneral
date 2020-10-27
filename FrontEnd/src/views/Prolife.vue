<template>
  <div class="home col-5 mx-auto py-5 mt-5">
    <h1 class="text'center" style="margin-left: 98px">Editar Contraseña</h1>
    <div class="card" style="border-radius: 20px">
        <div class="form-group" style="margin: 10px">
          <label >Nombre:</label>
          <input type="name"  class="form-control" id="name" style="border-radius: 50px" v-model="form.name">
        </div>
        <div class="form-group" style="margin: 10px">
          <label >Correo Electrónico:</label>
          <input type="email"  class="form-control" id="email" style="border-radius: 50px" v-model="form.email">
        </div>
        <div class="form-group" style="margin: 10px">
          <label >Contraseña:</label>
          <input type="password"  class="form-control" id="password" style="border-radius: 50px" v-model="form.password">
        </div>
        <div class="form-group" style="margin: 10px">
          <label >Confirmar Contraseña:</label>
          <input type="password"  class="form-control" id="password_confirmation" style="border-radius: 50px" v-model="form.password_confirmation">
        </div>
        <div class="form-group" style="margin: 10px">
          
          <vs-button @click.prevent="restablecer()" class="btn btn-primary btn-block" style="float: right;margin-right: 2px">Guardar</vs-button>
        
      </div>
    </div>
  </div>
</template>

<script>
import Persona from "../apis/Persona"
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        
      },
      error:[]
    }
  },
  methods: {
    recuperar(){
      Persona.recuperar().then(({data}) => {
        this.form = data;
      });
    },
    restablecer(){
      Persona.restablecer(this.form).then(({data}) => {
        console.log(data)
      }).catch( error => {
        if (error.response.status === 422) {
          this.error_validacion = error.response.data.errors;
        }
      });
    }
  },
  mounted() {
    this.recuperar();
  },
}
</script>
