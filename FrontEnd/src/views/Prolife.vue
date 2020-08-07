<template>
  <div class="home col-5 mx-auto py-5 mt-5">
    <h1 class="text'center" style="margin-left: 98px">Editar Contraseña</h1>
    <div class="card" style="border-radius: 20px">
        <div class="form-group" style="margin: 10px">
          <label for="name">Correo Electrónico:</label>
          <input type="email"  class="form-control" id="email" style="border-radius: 50px">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="name">Contraseña:</label>
          <input type="password"  class="form-control" id="pass" style="border-radius: 50px">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="name">Confirmar Contraseña:</label>
          <input type="password"  class="form-control" id="name" style="border-radius: 50px">
        </div>
        <div class="form-group" style="margin: 10px">
          <vs-button @click.prevent="" class="btn btn-primary btn-block" style="float: right;margin-right: 2px">Guardar</vs-button>
        
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
        password_confirmation: ""
      },
      error:[]
    }
  },
  methods: {
    updated() {
      Persona.updated(this.form)
      .then(() => {
        if (error.response.status === 442){
          this.error = error.response.data.error
        }
      })
    },
  },
}
</script>