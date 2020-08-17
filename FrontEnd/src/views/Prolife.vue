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
          <vs-button @click.prevent="cargar()" v-if="accion==0" class="btn btn-primary btn-block" style="float: right;margin-right: 2px">Cargar</vs-button>
          <vs-button @click.prevent="updated()" v-if="accion==1" class="btn btn-primary btn-block" style="float: right;margin-right: 2px">Guardar</vs-button>
        
      </div>
    </div>
  </div>
</template>

<script>
import Persona from "../apis/Persona"
export default {
  data() {
    return {
      accion: 0,
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
    abrir(tipo, datos = []){
      switch(tipo){
        case "cargar": {
          this.id = datos.id;
          this.name = datos.name;
          this.email = datos.email;
          this.password =  datos.password;
          this.password_confirmation =  datos.password_confirmation;
          break
        }
        case "updated": {
          this.id = datos.id,
          this.name = datos.name,
          this.email = datos.email,
          this.password = datos.password,
          this.password_confirmation = datos.password_confirmation
        }
      }
    },
    updated() {
      Persona.updated(this.form)
      .then(() => {
        if (error.response.status === 442){
          this.error = error.response.data.error
        } else{
          Persona.updated().then(({data}) =>{
            this.form =(
              id= this.id,
              name= this.name,
              email= this.email,
              password= this.password,
              password_confirmation= this.password_confirmation
            )
          })
        }
      })
    },
    cargar(){
      Persona.updated(this.form)
      .the(()=> {
            this.form =(
              id= this.id,
              name= this.name,
              email= this.email,
              password= this.password,
              password_confirmation= this.password_confirmation
            )
      })
    }
  },
  mounted() {
    this.updated();
  },
}
</script>