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
              <img :src="'archivos/imagenes/'+tr.foto" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
              <div class="card-body">
                <vs-row vs-justify="flex-end" style=";bottom: 10px;">
                  <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                  <div v-for="(tr,index_hijo) in tr" :key="index_hijo">
                    <vs-input state="success" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_letras(index, tr, index_hijo)"></vs-input>
                  </div>
                </vs-row>
              </div>
            </div>
          </div>
        </vs-col>
      </vs-row>
      <div class="content-inputs " >
        <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient">
          <vs-tooltip circl>
            <i class="fas fa-check fa-2x"></i>
            <template #tooltip>
              Verificar
            </template>
          </vs-tooltip>
        </vs-button>
      </div>
    </div>
    <!-- silabas -->
    <div  class="tab-pane fade show  mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in silabas.preguntas" :key="index">
          <div class="col-lg-12 mb-4" >
            <div class="card m-3 " style="border-radius: 50px" >
              <img :src="'archivos/imagenes/escuchar'+'.png'" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
              <div class="card-body" >
                <vs-row vs-justify="flex-end" style="bottom: 0px">
                  <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                  <div v-for="(tr,index_h) in tr.respuestas" :key="index_h">
                    <vs-input state="success" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @click="seleccionar_silabas(index, tr, index_h)"/>
                  </div>
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
        {{variable_seleccionado}}
    </div>
    <!-- palabra -->
    <div  class="tab-pane fade show  mt-5" id="c" role="tabpanel" aria-labelledby="lev3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in palabras.preguntas" :key="index">
          <div class="col-lg-12">
            <div class="card m-3 " style="border-radius: 50px">
              <img :src="'archivos/imagenes/escuchar'+'.png'" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
              <div class="card-body" >
                <vs-row vs-justify="flex-end" style="bottom: 0px;">
                  <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                  <div v-for="(tr,index_hi) in tr.respuestas" :key="index_hi">
                    <vs-input state="success" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @click="seleccionar_palabras(index, tr, index_hi)"></vs-input>
                  </div>
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
  {{variable_seleccionado}}
</div>
</template>
<script src="archivos/voz.js"></script>
<script>
import Api from "../apis/Nivel3";
export default {
  data(){
    return{
      letras:{
        preguntas:[
          // {
          //   foto:"escuchar.png",
          //   audio:"s",
          //   respuestas:[
          //     {
          //       nombre: "s"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"r",
          //   respuestas:[
          //     {
          //       nombre: "r"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"t",
          //   respuestas:[
          //     {
          //       nombre: "t"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"l",
          //   respuestas:[
          //     {
          //       nombre: "l"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"f",
          //   respuestas:[
          //     {
          //       nombre: "f"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"b",
          //   respuestas:[
          //     {
          //       nombre: "b"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"x",
          //   respuestas:[
          //     {
          //       nombre: "x"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"y",
          //   respuestas:[
          //     {
          //       nombre: "y"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"o",
          //   respuestas:[
          //     {
          //       nombre: "o"
          //     }
          //   ]
          // },
          // {
          //   foto:"escuchar.png",
          //   audio:"c",
          //   respuestas:[
          //     {
          //       nombre: "c"
          //     }
          //   ]
          // },
          
        ]
      },
      silabas:{
        preguntas:[
          {
            foto:"escuchar.png",
            audio:"con",
            respuestas:[
              {
                nombre: "con"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"ir",
            respuestas:[
              {
                nombre: "ir"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"que",
            respuestas:[
              {
                nombre: "que"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"ya",
            respuestas:[
              {
                nombre: "ya"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"un",
            respuestas:[
              {
                nombre: "un"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"in",
            respuestas:[
              {
                nombre: "in"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"im",
            respuestas:[
              {
                nombre: "im"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"si",
            respuestas:[
              {
                nombre: "si"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"por",
            respuestas:[
              {
                nombre: "por"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"tos",
            respuestas:[
              {
                nombre: "tos"
              }
            ]
          },
          
        ]
      },
      palabras:{
        preguntas:[
          {
            foto:"escuchar.png",
            audio:"Cafetería",
            respuestas:[
              {
                nombre: "Cafetería"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Jinete",
            respuestas:[
              {
                nombre: "Jinete"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Naranja",
            respuestas:[
              {
                nombre: "Naranja"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Presentador",
            respuestas:[
              {
                nombre: "Presentador"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Ballena",
            respuestas:[
              {
                nombre: "Ballena"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Sandía",
            respuestas:[
              {
                nombre: "Sandía"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Árboles",
            respuestas:[
              {
                nombre: "Árboles"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Tablero",
            respuestas:[
              {
                nombre: "Tablero"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Complejo",
            respuestas:[
              {
                nombre: "Complejo"
              }
            ]
          },
          {
            foto:"escuchar.png",
            audio:"Opinión",
            respuestas:[
              {
                nombre: "Opinión"
              }
            ]
          },
        ]
      },
      
      variable_seleccionado:[],
    }
  },
  methods:{
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1) this.letras.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2) this.silabas.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==3) this.palabras.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach(pr => {
            if(el.id==pr.id_subnivel && el.subnivel==1){  
              if(!this.letras.preguntas[index].respuestas) this.letras.preguntas[index].respuestas = [];
              this.letras.preguntas[index].respuestas.push(pr); 
              if(el.id==pr.id_subnivel && el.subnivel==2){  
                if(!this.silabas.preguntas[index].respuestas) this.silabas.preguntas[index].respuestas = [];
                this.silabas.preguntas[index].respuestas.push(pr); 
              }
              if(el.id==pr.id_subnivel && el.subnivel==3){  
                if(!this.palabras.preguntas[index].respuestas) this.palabras.preguntas[index].respuestas = [];
                this.palabras.preguntas[index].respuestas.push(pr); 
              }
            }
          });
        });
      });
    },
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
      //var voicelist = responsiveVoice.getVoices();
      //console.log(voicelist);
    },
    seleccionar_letras(index, tr, index_hijo){
      if(this.variable_seleccionado.length==0){
        this.letras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.letras.preguntas[index].respuestas[index_hijo];
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_silabas(index, tr, index_h){
      if(this.variable_seleccionado.length==0){
        this.silabas.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.silabas.preguntas[index].respuestas[index_h];
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_palabras(index, tr, index_hi){
      if(this.variable_seleccionado.length==0){
        this.letras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.letras.preguntas[index].respuestas[index_hi];
      this.variable_seleccionado.splice(index,1,tr);
    },
    enviarletras(){
      Api.enviarletras(this.variable_seleccionado).then( ({data}) => {
        // console.log(data);
      }).catch( error => {
        console.log(error);
      });
    },
    enviarsilabas(){
      Api.enviarsilabas(this.variable_seleccionado).then( ({data}) => {
        // console.log(data);
      }).catch( error => {
        console.log(error);
      });
    },
    enviarpalabras(){
      Api.enviarpalabras(this.variable_seleccionado).then( ({data}) => {
        // console.log(data);
      }).catch( error => {
        console.log(error);
      });
    },
  },
  mounted() {
    this.llamarpreguntas();
  },
}
</script>

<style >
  .w-100 input{
    width: 100%!important;
  }
</style>