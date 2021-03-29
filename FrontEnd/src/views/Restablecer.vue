<template>
  <div class="container">
    <div class="card" style="border-radius: 20px">
      <div class="row form-material" v-if="tipo">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <h3 class="mt-4 text-center mb-5">Mi perfil de usuario</h3>
          <vs-alert class="mb-3">
              <template #title>
                Forma de uso
              </template>
                Debe ingresar todos los datos para guardar.
            </vs-alert>
        </div>
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
              <input type="text" class="form-control" id="inlineFormInputGroup" v-model="edad" maxlength="3" disabled>
              <div class="input-group-prepend">
                <div class="input-group-text">Años</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="fecha_nacimiento">Fecha Nacimiento:</label>
             <div class="input-group mb-2">
              <input type="date" v-model="form.fecha_nacimiento" class="form-control">
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
              <input type="text"  class="form-control" id="telefono" v-model="form.telefono" maxlength="7">
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
              <input type="text"  class="form-control" id="celular" v-model="form.celular" maxlength="10">
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
              <input type="text"  class="form-control" id="direccion" v-model="form.direccion" maxlength="25">
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
      <div class="row form-material" v-else>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <h3 class="mt-4 text-center mb-5">Cambiar contraseña</h3>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="name">Contraseña Anterior:</label>
            <div class="input-group mb-2">
              <input type="password"  class="form-control" id="name" v-model="form.old_password">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-key"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.old_password">
              {{ error_validacion.old_password[0] }}
            </span>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="name">Contraseña Nueva:</label>
            <div class="input-group mb-2">
              <input type="password"  class="form-control" id="name" v-model="form.password">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
              </div>
            </div>
            <span class="text-danger" v-if="error_validacion.password">
              {{ error_validacion.password[0] }}
            </span>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
          <div class="form-group" style="margin: 10px">
            <label for="edad">Repetir Contraseña Nueva:</label>
            <div class="input-group mb-2">
              <input type="password" class="form-control" id="inlineFormInputGroup" v-model="form.password_confirmation">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group" style="margin: 10px">
        <vs-button @click="restablecer" class="btn btn-primary btn-block" style="float: right;margin-right: 2px" v-if="tipo">Guardar</vs-button>
        <vs-button @click="restablecer_pass" class="btn btn-primary btn-block" style="float: right;margin-right: 2px" v-else>Guardar</vs-button>
      </div>
      <div class="form-group mt-3 mb-4 text-center" v-if="tipo">
        Quieres cambiar de contraseña? <a href="javascript:void(0)" @click="tipo=false">Cambiar contreseña</a>
      </div>
      <div class="form-group mt-3 mb-4 text-center" v-else>
        Quieres cambiar tus datos? <a href="javascript:void(0)" @click="tipo=true">Volver a mi perfil</a>
      </div>
    </div>
  </div>
</template>

<script>
import Persona from "../apis/Persona";
import Datepicker from 'vuejs-datepicker';
import { es } from 'vuejs-datepicker/dist/locale';
import moment from "moment";
moment.locale("es");

export default {
  components: {
    Datepicker
  },
  data() {
    return {
      baseURL: "http://localhost:8000/api",
      es: es,
      form: {
        id: "",
        name: "",
        email: "",
        old_password:"",
        password: "",
        password_confirmation: "",
        fecha_nacimiento:"",
        telefono:"",
        celeular:"",
        direccion:"",
        foto:"",
        imagen:"",
      },
      error:[],
      error_validacion:[],
      previewImage: null,
      tipo: true,
    }
  },
  computed:{
    edad(){
      var edad = "Debe escoger una fecha";
      if(this.form.fecha_nacimiento){
        edad =  (moment(moment(this.form.fecha_nacimiento).format("YYYYMMDD"), "YYYYMMDD").fromNow()).replace("Hace", "");
      }
      return edad;
    }
  },
  methods: {
    recuperar(){
      Persona.recuperar().then(({data}) => {
        this.form = data;
        this.form.fecha_nacimiento = moment(this.form.fecha_nacimiento).format("YYYY-MM-DD");
      });
    },
    restablecer(){
      this.clean();
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
          });
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
    restablecer_pass(){
      this.clean();
      Persona.password(this.form).then(({data}) => {
        console.log(data);
        this.$root.$emit("login", true);
        localStorage.setItem("token", data);
        this.$vs.notification({
          square: true,
          color:'success',
          title: 'Cambios guardados satisfactoriamente',
          text: 'La contraseña se ha guardado en el sistema'
        })
        setTimeout(() => {
          location.reload();
        }, 1000);
      }).catch(error => {
        console.log(error.response.data.errors);
        if (error.response.status === 422) {
          this.error_validacion = error.response.data.errors;
        }
      });
    },
    clean(){
      this.error_validacion = [];
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


