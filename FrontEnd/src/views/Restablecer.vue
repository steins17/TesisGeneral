<template>
  <div class="container">
    <div class="card" style="border-radius: 20px">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
          <div class="form-group" style="margin: 10px">
            <label for="name">Nombre:</label>
            <input type="text"  class="form-control" id="name" style="border-radius: 50px" v-model="form.name">
            <span class="text-danger" v-if="error_validacion.email">
              {{ error_validacion.name[0] }}
            </span>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
          <div class="form-group" style="margin: 10px">
            <label for="edad">Edad:</label>
            <input type="text"  class="form-control" id="edad" style="border-radius: 50px" v-model="form.edad">
          </div>
        </div>
      </div>
        <div class="form-group" style="margin: 10px">
          <label for="fecha">Fecha Nacimiento:</label>
          <input type="text"  class="form-control" id="fecha_nacimiento" style="border-radius: 50px" v-model="form.fecha_nacimiento">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="telefono">Teléfono:</label>
          <input type="text"  class="form-control" id="telefono" style="border-radius: 50px" v-model="form.telefono">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="celular">Celular:</label>
          <input type="text"  class="form-control" id="celular" style="border-radius: 50px" v-model="form.celular">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="dirrecion">Dirección:</label>
          <input type="text"  class="form-control" id="direccion" style="border-radius: 50px" v-model="form.direccion">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="email">Correo Electrónico:</label>
          <input type="email"  class="form-control" id="email" style="border-radius: 50px" v-model="form.email">
        </div>
        <div class="form-group" style="margin: 10px">
          <label for="foto">Foto</label>
          <input type="text"  class="form-control" id="foto" style="border-radius: 50px" v-model="form.foto">
        </div>
        <div class="form-group" style="margin: 10px">
          <vs-button @click.prevent="restablecer" class="btn btn-primary btn-block" style="float: right;margin-right: 2px">Guardar</vs-button>
      </div>
    </div>
  </div>
</template>

<script>
import Persona from "../apis/Persona";

export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        fecha_nacimiento:"",
        edad:"",
        telefono:"",
        celeular:"",
        direccion:"",
        foto:""
      },
      error:[],
      error_validacion:[],
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
        console.log(data);
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