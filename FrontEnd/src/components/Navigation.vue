<template>
  <div class="hidden">
    <vs-navbar shadow square center-collapsed fixed v-model="active" style="z-index: 99999;">
      <template #left>
        <div class="vs-navbar--header">
          <div class="themelogo" :class="{'noneleg': hover}">
            <img src="archivos/imagenes/perfiles/itq.png" alt="Dashboard" width="70" height="40" style="margin-right: 10px;">
            <span class="logo-text" :class="{'none': hover}">Tesis ITQ</span> 
          </div>
        </div>
        <vs-button @click="settings()" icon class="botonmenu dseleccion" :class="{'seleccion': !hover}">
          <i class="fas fa-bars dseleccionb" :class="{'seleccionb': !hover}"></i>
        </vs-button>
      </template>
      <template #right v-if="user">
        <dropdown-menu v-model="menuver" :interactive="interactive">
          <button type="button" left="" class="vs-con-dropdown parent-dropdown cursor-pointer pr-2 pl-2 ml-1 mr-md-3">
            <a href="#" class="text-white-dark user-image">
              <img src="archivos/imagenes/perfiles/descarga.jpg" alt="User">
            </a>
          </button>   
          <div slot="dropdown"> 
              <a class="dropdown-item" href="#"> <i class="fas fa-user"></i> Mi perfil</a>
              <a class="dropdown-item" href="#"> <i class="fas fa-poll-h"></i> Mis respuestas</a>
              <a class="dropdown-item" href="#"> <i class="fas fa-cogs"></i> Configuración</a>
              <hr>
              <a class="dropdown-item" href="#" @click="logout()"> <i class="fa fa-sign-out"></i> Cerrar sesión</a>
          </div>
        </dropdown-menu>
      </template>
      <template #right v-else>
        <vs-button to="login">Login</vs-button>
        <vs-button to="registro">Registro</vs-button>
      </template>
    </vs-navbar>
    <vs-sidebar
      fixed
      v-model="active"
      :open="open"
      :hover-expand="hover"
      :reduce="reduce"
      style="padding-top: 60px !important;"
      >
        <header class="vs-sidebar--header" v-if="user">
          <div class="header-sidebar text-center">
            <div class="con-vs-avatar 70px" style="width: 70px; height: 70px; background: rgb(195, 195, 195);">
              <div class="con-img vs-avatar--con-img"><img src="archivos/imagenes/perfiles/descarga.jpg" alt="">
              </div></div>
              <h4>{{ user.name }}<br><small>{{ user.email }}</small></h4>
          </div>
        </header>
        <h4>
          <span class="small-cap">Panel principal</span>
        </h4>
        <vs-sidebar-item id="inicio" to="/">
          <template #icon>
            <i class="fas fa-home"></i>
          </template>
          Inicio
        </vs-sidebar-item>
        <h4>
          <span class="small-cap">Niveles de ejercicios</span>
        </h4>
        <vs-sidebar-item id="nivel1" to="nivel1">
          <template #icon>
            <i class="fas fa-circle-notch"><span class="subnumero">1</span></i>
          </template>
          Nivel 1
        </vs-sidebar-item>
        <vs-sidebar-item id="nivel2" to="nivel2">
          <template #icon>
            <i class="fas fa-circle-notch"><span class="subnumero">2</span></i>
          </template>
          Nivel 2
        </vs-sidebar-item>
        <vs-sidebar-item id="nivel3" to="nivel3">
          <template #icon>
            <i class="fas fa-circle-notch"><span class="subnumero">3</span></i>
          </template>
          Nivel 3
        </vs-sidebar-item>
        <vs-sidebar-item id="nivel4" to="nivel4">
          <template #icon>
            <i class="fas fa-circle-notch"><span class="subnumero">4</span></i>
          </template>
          Nivel 4
        </vs-sidebar-item>
        <h4 v-if="user">
          <span class="small-cap">Configuración</span>
        </h4>
        <vs-sidebar-item id="Restablacer" to="Restablecer" v-if="user">
          <template #icon>
            <i class="fas fa-user"></i>
          </template>
          Mi Perfil
        </vs-sidebar-item>
        <vs-sidebar-item id="Perfil" to="prolife" >
          <template #icon>
            <i class="fas fa-cogs"></i>
          </template>
          Restablacer contraseña
        </vs-sidebar-item>
        <template #footer>
          <vs-row justify="space-between">
            <vs-avatar badge-color="danger" badge-position="top-right">
              <vs-tooltip circle>
                <i class="fas fa-bell cursor-pointer" ></i>
                <template #badge>
                  28
                </template>
                <template #tooltip>
                  Notificaciones
                </template>
              </vs-tooltip>
            </vs-avatar>
            <vs-avatar @click="logout()">
              <vs-tooltip circle>
                <i class="fa fa-sign-out cursor-pointer" aria-hidden="true"></i>
                <template #tooltip>
                  Cerrar sesión
                </template>
              </vs-tooltip>
            </vs-avatar>
          </vs-row>
        </template>
    </vs-sidebar>
    <div class="main-container-fluid" :class="{'espaciado':!hover}">
      <router-view />
    </div>
  </div>
</template>
<script>
  import DropdownMenu from '@innologica/vue-dropdown-menu'
  import User from "../apis/User";
  import Persona from "../apis/Persona";
  const $ = require('jquery')
  window.$ = $

  export default {
    components:{
      'dropdown-menu':DropdownMenu
    },
    data: () => ({
      open: true,
      hover:true,
      reduce:true,
      active:true,
      menuver:false,
      interactive:true,
      user: null,
      val_loading:null,
    }),
    methods:{
      settings(){
        this.reduce = !this.reduce;
        this.hover = !this.hover;
        localStorage.setItem("settings",JSON.stringify({reduce:this.reduce,hover:this.hover}));
      },
      usuario(){
        if(localStorage.getItem("token")){
          User.auth().then(response => {
            this.user = response.data;
          }).catch(error => {
            if (error.response.status === 401) {
              localStorage.removeItem("token");
              console.log("debes iniciar sesión");
            }
          });
        }
      },
      logout() {
        this.user = null;
        this.loading("open");
        User.logout().then(() => {
          localStorage.removeItem("token");
          this.isLoggedIn = false;
          this.$router.push({ name: "Inicio" });
          this.loading("close");
        }).catch(() => {
          this.loading("close");
        });
      },
      loading(close) {
        if(close=="open"){
          this.val_loading = this.$vs.loading({text: 'Cargando...'});
          $("body").css("overflow-y","hidden");
        }else if(close=="close"){
          this.val_loading.close();
          $("body").css("overflow-y","auto");
        }
      },
    },
    mounted() {
      this.val_loading = this.$vs.loading({text: 'Cargando...'});
      setTimeout(() => {
        this.loading("close");
      }, 800);
      if(localStorage.getItem("settings")){
        var valor = JSON.parse(localStorage.getItem("settings"));
        this.reduce = valor.reduce;
        this.hover = valor.hover;
      }
      this.usuario();
    }
  };
</script>
<style>
  .subnumero{
    position: absolute;
    left: 6px;
    top: 3px;
    font-size: 13px;
    font-weight: bold;
  }
  .fas{
    position:relative;
  }
  .dseleccion{
    background: #fff!important;
  } 
  .seleccion{
    background: #195bff!important;
  }
  .dseleccion{
    background: #195bff!important;
  }
  .espaciado{
    padding: 84px 20px 20px 280px!important;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .main-container-fluid {
    padding: 84px 20px 20px 70px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .vs-sidebar--header {
    border-bottom: 1px solid rgba(0,0,0,.06);
    padding: 10px 5px;
    width: 100%;
  }
  .con-vs-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    position: relative;
    cursor: pointer;
    display: inline-block;
    margin: 5px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .vs-avatar--con-img {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    border-radius: 50%;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .vs-avatar--con-img img {
    width: 100%;
  }
  .small, small {
    font-size: 80%;
    font-weight: 400;
  }
  .h4, h4 {
    font-size: 1.125rem;
  }
  .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      margin-bottom: 0;
      font-family: inherit;
      font-weight: 700;
      line-height: 1.2;
  }
  article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
    display: block;
  }
  body {
    margin: 0;
    font-family: Nunito Sans,sans-serif;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.45;
    color: #2b2b2b;
    text-align: left;
    background-color: #f0f5f9;
  }
  .reduce .con-vs-avatar {
    width: 40px!important;
    height: 40px!important;
    padding: 0!important;
    margin: 5px -1px;
    display: block;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .reduce h4 {
    display: block;
    position: relative;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
    font-size: .7rem;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .cursor-pointer{
    cursor:pointer;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .vs-sidebar__footer{
    background: #e8e8e8;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .vs-sidebar__footer .vs-avatar{
    background: #e8e8e8;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .vs-navbar {
    padding: 8px 15px;
    background: #195bff;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .small-cap {
    padding: 25px 15px 10px 10px;
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }
  .vs-sidebar__item__icon{
    height: 31px;
    width: 31px;
    margin: 8px -1px;
  }
  .vs-navbar--header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }
  .topnavbar {
    color: #fff;
    min-height: 60px;
    position: fixed;
  }
  img, svg {
    vertical-align: middle;
  }
  .logo-text {
      font-size: 20px;
      font-weight: 700;
      color: #fff;
  }
  .themelogo {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    min-width: 235px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 0px;
  }
  img {
    border-style: none;
  }
  .none{
    display:none;
  }
  .noneleg{
    min-width: 0px;
  }
  button{
    outline: none!important;
  }
  .user-image img {
    border-radius: 100%;
    width: 32px;
  }
  .vs-con-dropdown {
    position: relative;
    display: inline-block;
    border: 0;
    background: transparent;
  }
  .text-white-dark {
    color: hsla(0,0%,100%,.7);
  }
  .dropdown-menu{
    margin-left: -123px;
    margin-top: 10px;
    min-width: 200px;
    padding: 0;
  }
  .dropdown-item {
    padding: .75rem 1.5rem;
  }
  hr{
    margin: 5px 0;
  }
  .translate-fade-down-enter-active, .translate-fade-down-leave-active {
    transition: all 250ms;
    transition-timing-function: cubic-bezier(.53,2,.36,.85);
  }
  .translate-fade-down-enter, .translate-fade-down-leave-active {
      opacity: 0;
  }
  .translate-fade-down-enter, .translate-fade-down-leave-to {
      position: absolute;
  }

  .translate-fade-down-enter {
      transform: translateY(-10px);
  }
  .translate-fade-down-leave-active {
      transform: translateY(10px);
  }
  .vs-loading--default{
    background: rgba(255,255,255);
  }
</style>