<template>
<div>
  <ul class="nav nav-tabs" id="mytab2" role="tablist2">
    <li class="nav-item col-lg-4 text-center">
      <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="level3" aria-selected="true" style="border-radius: 50px">LETRAS</a>
    </li>
    <li class="nav-item col-lg-4 text-center">
      <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="leve3" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
    </li>
    <li class="nav-item col-lg-4 text-center">
      <a class="nav-link " id="lev3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="lev3" aria-selected="false" style="border-radius: 50px">PALABRAS</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent2">
    <!-- letras -->
    <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0"  v-for="(tr,index) in letras.preguntas" :key="index">
          <div class="col-lg-12 mb-4"  >
            <div class="card m-3" style="border-radius: 50px">
              <img :src="'archivos/imagenes/escuchar'+'.png'" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
              <div class="card-body">
                <vs-row vs-justify="flex-end" style=";bottom: 0px;display: block;">
                  <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                  <vs-input state="success"  placeholder="Escribir" style="margin-bottom: 20px"></vs-input>
                </vs-row>
              </div>
            </div>
          </div>
        </vs-col>
      </vs-row>
      <div class="content-inputs ">
        <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviarletras()">
          <vs-tooltip circl>
            <i class="fas fa-check fa-2x"></i>
            <template #tooltip>
              Verificar
            </template>
          </vs-tooltip>
        </vs-button>
      </div>
      {{variable_seleccionado}}
    </div>
    <!-- silabas -->
    <div  class="tab-pane fade show  mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in silabas.preguntas" :key="index">
          <div class="col-lg-12 mb-4" >
            <div class="card m-3 " style="border-radius: 50px" >
              <img :src="'archivos/imagenes/escuchar'+'.png'" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
              <div class="card-body" >
                <vs-row vs-justify="flex-end" style="bottom: 0px;display: block;">
                  <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                    <vs-input state="success"   placeholder="Escribir" style="margin-bottom: 20px"></vs-input>
                </vs-row>
              </div>
            </div>
          </div>
        </vs-col>
      </vs-row>
      <div class="content-inputs">
        <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviarsilabas()">
          <vs-tooltip circl>
            <i class="fas fa-check fa-2x"></i>
            <template #tooltip>
              Verificar
            </template>
          </vs-tooltip>
        </vs-button>
        </div>
    </div>
    <!-- palabra -->
    <div  class="tab-pane fade show  mt-5" id="c" role="tabpanel" aria-labelledby="lev3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in palabras.preguntas" :key="index">
          <div class="col-lg-12">
            <div class="card m-3 " style="border-radius: 50px">
              <img :src="'archivos/imagenes/escuchar'+'.png'" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
              <div class="card-body" >
                <vs-row vs-justify="flex-end" style="bottom: 0px;display: block;">
                  <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                    <vs-input state="success"   placeholder="Escribir" style="margin-bottom: 20px"></vs-input>
                </vs-row>  
              </div>
            </div>
          </div>
        </vs-col>
      </vs-row>
      <div >
        <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviarpalabras()">
          <vs-tooltip circl>
            <i class="fas fa-check fa-2x"></i>
            <template #tooltip>
              Verificar
            </template>
          </vs-tooltip>
        </vs-button>
      </div>
    </div>
  </div>
</div>
</template>
<script src="archivos/voz.js"></script>
<script>
const $ = require('jquery');
import Api from "../apis/Nivel3";
export default {
  data(){
    return{
      letras:{
        preguntas:[
          {
            id:"1",
            audio:"s",
            respuesta:"s"
          },
          {
            id:"2",
            audio:"r",
            respuesta:"r"
          },
          {
            id:"3",
            audio:"t",
            respuesta:"t"
          },
          {
            id:"4",
            audio:"l",
            respuesta:"l"
          },
          {
            id:"5",
            audio:"f",
            respuesta:"f"
          },
          {
            id:"6",
            audio:"b",
            respuesta:"b"
          },
          {
            id:"7",
            audio:"x",
            respuesta:"x"
          },
          {
            id:"8",
            audio:"y",
            respuesta:"y"
          },
          {
            id:"9",
            audio:"o",
            respuesta:"o"
          },
          {
            id:"10",
            audio:"c",
            respuesta:"c"
          },
        ]
      },
      silabas:{
        preguntas:[
          {
            id:"1",
            audio:"con",
            respuesta:"con"
          },
          {
            id:"2",
            audio:"ir",
            respuesta:"ir"
          },
          {
            id:"3",
            audio:"que",
            respuesta:"que"
          },
          {
            id:"4",
            audio:"ya",
            respuesta:"ya"
          },
          {
            id:"5",
            audio:"un",
            respuesta:"un"
          },
          {
            id:"6",
            audio:"in",
            respuesta:"in"
          },
          {
            id:"7",
            audio:"immmm",
            respuesta:"im"
          },
          {
            id:"8",
            audio:"si",
           respuesta:"si" 
          },
          {
            id:"9",
            audio:"por",
            respuesta:"por"
          },
          {
            id:"10",
            audio:"ttoos",
            respuesta:"tos"
          },
        ]
      },
      palabras:{
        preguntas:[
          {

            id:"1",
            audio:"Cafetería",
            respuesta:"Cafetería"
          },
          {
            id:"2",
            audio:"Jinete",
            respuesta:"Jinete"
          },
          {
            id:"3",
            audio:"Naranja",
            respuesta:"Naranja"
          },
          {
            id:"4",
            audio:"Presentador",
            respuesta:"Presentador"
          },
          {
            id:"5",
            audio:"Ballena",
            respuesta:"Ballena"
          },
          {
            id:"6",
            audio:"Sandía",
            respuesta:"Sandía"
          },
          {
            id:"7",
            audio:"Árboles",
            respuesta:"Árboles"
          },
          {
            id:"8",
            audio:"Tablero",
            respuesta:"Tablero"
          },
          {
            id:"9",
            audio:"Complejo",
            respuesta:"Complejo"
          },
          {
            id:"10",
            audio:"Opinión",
            respuesta:"opinion"
          },
        ]
      },
      value:"",
      variable_seleccionado:[],
    }
  },
  methods:{
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
      //var voicelist = responsiveVoice.getVoices();
      //console.log(voicelist);
    },
    enviarletras(){
      Api.enviarletras(this.variable_seleccionado).then( ({data}) => {

      }).catch( error => {
        console.log(error);
      });
    },
    enviarsilabas(){
      Api.enviarsilabas(this.variable_seleccionado).then( ({data}) => {

      }).catch( error => {
        console.log(error);
      });
    },
    enviarpalabras(){
      Api.enviarpalabras(this.variable_seleccionado).then( ({data}) => {

      }).catch( error => {
        console.log(error);
      });
    },
  }
}
</script>