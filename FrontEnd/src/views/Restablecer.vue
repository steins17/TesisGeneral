<template>
  <div class="container">
    <div class="card" style="border-radius: 20px">
      <div class="row form-material">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="name">Nombre:</label>
            <div class="input-group mb-2">
              <input type="text"  class="form-control" id="name" v-model="form.name">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.name">
              {{ error_validacion.name[0] }}
            </span>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="edad">Edad:</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="inlineFormInputGroup" v-model="form.edad">
              <div class="input-group-prepend">
                <div class="input-group-text">Años</div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.edad">
              {{ error_validacion.edad[0] }}
            </span>
          </div>
        </div>
        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="fecha_nacimiento">Fecha Nacimiento:</label>
             <div class="input-group mb-2">
              <datepicker v-model="form.fecha_nacimiento" class="form-control stylepicker" :language="es"></datepicker>
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.fecha_nacimiento">
                {{ error_validacion.fecha_nacimiento[0] }}
              </span>
          </div>
        </div> 
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4"> 
          <div class="form-group" style="margin: 10px">
            <label for="telefono">Teléfono:</label>
            <div class="input-group mb-2">
              <input type="text"  class="form-control" id="telefono" v-model="form.telefono">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-phone"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.telefono">
                {{ error_validacion.telefono[0] }}
              </span>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="celular">Celular:</label>
            <div class="input-group mb-2">
              <input type="text"  class="form-control" id="celular" v-model="form.celular">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.celular">
                {{ error_validacion.celular[0] }}
              </span>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="dirrecion">Dirección:</label>
            <div class="input-group mb-2">
              <input type="text"  class="form-control" id="direccion" v-model="form.direccion">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-directions"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.direccion">
                {{ error_validacion.direccion[0] }}
              </span>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="email">Correo Electrónico:</label>
            <div class="input-group mb-2">
              <input type="email"  class="form-control" id="email" v-model="form.email">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-at"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.email">
                {{ error_validacion.email[0] }}
              </span>
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4 text-center">
            <h3 class="mb-3">Foto de Usuario</h3>
            <div class="card w-100 text-center" style="border: none;" v-if="previewImage || form.foto">
              <div class="imagePreviewWrapper"  v-if="previewImage" :style="{ 'background-image': `url(${previewImage})` }" @click="selectImage"></div>
              <img class="imagePreviewWrapper" v-else-if="form.foto" :src="baseURL+'/perfil/imagenver/'+form.foto" @click="selectImage">
            </div>
            <vs-button @click="agregarimagen" v-else class="btn btn-primary btn-block btnimge" style="float: right;margin-right: 2px;">Agregar Imagen</vs-button>
            <input ref="fileInput" id="fileimage" type="file" @input="pickFile" style="display:none">
            <span class="text-danger" v-if="error_validacion.foto">
              {{ error_validacion.foto[0] }}
            </span>
          </div>
        </div>
      </div>
      <div class="form-group" style="margin: 10px">
        <vs-button @click="restablecer" class="btn btn-primary btn-block" style="float: right;margin-right: 2px">Guardar</vs-button>
      </div>
      <div class="form-group mt-3 mb-4 text-center">
        Quieres cambiar de contraseña? <a href="Restablecer" >Restablecer contreseña</a>
      </div>
    </div>
  </div>
</template>

<script>
import Persona from "../apis/Persona";
import Datepicker from 'vuejs-datepicker';
import { es } from 'vuejs-datepicker/dist/locale';

export default {
  components: {
    Datepicker
  },
  data() {
    return {
      baseURL: "http://localhost:8000/api",
      es: es,
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
        foto:"",
        imagen:"",
      },
      error:[],
      error_validacion:[],
      previewImage: null,
    }
  },
  methods: {
    recuperar(){
      Persona.recuperar().then(({data}) => {
        this.form = data;
      });
    },
    restablecer(){
      Persona.restablecer(this.form).then(() => {
        let formData = new FormData();
        formData.append("imagen", this.form.foto);
        Persona.imagen(formData).then(({data}) => {
          this.$root.$emit("login", true);
          localStorage.setItem("token", data);
          this.$vs.notification({
            square: true,
            color:'success',
            title: 'Cambios guardados satisfactoriamente',
            text: 'Los cambios se guardaron en el sistema'
          })
          setTimeout(() => {
            location.reload();
          }, 1000);
        }).catch(error => {
          if (error.response.status === 422) {
            this.error_validacion = error.response.data.errors;
          }
        })
      }).catch( error => {
        if (error.response.status === 422) {
          this.error_validacion = error.response.data.errors;
        }
      });
    },
    //imagen
    selectImage() {
      this.$refs.fileInput.click()
    },
    pickFile() {
      let input = this.$refs.fileInput
      let file = input.files
      this.form.foto = file[0];
      if (file && file[0]) {
        let reader = new FileReader
        reader.onload = e => {
          this.previewImage = e.target.result
        }
        reader.readAsDataURL(file[0])
        this.$emit('input', file[0])
      }
    },
    agregarimagen(){
      $("#fileimage").click();
    }
  },
  mounted() {
    this.recuperar();
  },
}
</script>
<style>
  .form-material input{
    border: none!important;
    border-bottom: 1px solid #ccd4da!important;
    border-radius: 0px!important;
    outline:none!important;
    box-shadow: none!important;
  }
  .form-material label{
    margin-left: 0.5em;
  }
  .stylepicker{
    border: none;
  }
  .stylepicker input{
    width: 101%;
    height: 32px;
  }
  .imagePreviewWrapper {
    width: 100%;
    height: 400px;
    max-height: 600px;
    display: block;
    cursor: pointer;
    background-size: cover;
    background-position: center center;
    border-radius: 11px;
    border: 4px solid #195bff;
  }
  .btnimge{
    margin-right: 2px;
    padding: 0!important;
    border-radius: 10px;
    margin: 0px;
    margin-top: -1px;
  }
</style>