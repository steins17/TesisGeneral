<template> 
  <div>
      <ul class="nav nav-tabs" id="myTab1" role="tablist1">
        <li class="nav-item col-lg-4 text-center">
          <a class="nav-link active" id="level2-tab" data-toggle="tab" href="#level2" role="tab" aria-controls="level2" aria-selected="true" style="border-radius: 50px">LETRAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center">
          <a class="nav-link" id="level-tab" data-toggle="tab" href="#level" role="tab" aria-controls="level" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center">
          <a class="nav-link " id="p-tab" data-toggle="tab" href="#p" role="tab" aria-controls="p" aria-selected="false" style="border-radius: 50px">ORACIONES</a>
        </li>
      </ul> 
      <div class="tab-content" id="myTabContent1">
        <!-- Letras -->
        <div class="tab-pane fade show active mt-5" id="level2" role="tabpanel" aria-labelledby="level2-tab">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <div class="card mb-3 p-3" style="border-radius: 50px" v-for="(tr,index) in letras.preguntas" :key="index">
                  <vs-row>
                    <vs-col vs-justify="flex-end">
                      <center>
                        <vs-button color="primary" style="postion: center" type="gradient" class="col-lg-4  p-3" @click.prevent="sonido(tr.audio)">
                          <vs-tooltip circl>
                            <i class="fas fa-volume-up fa-2x"></i>
                            <template #tooltip>
                              Escuchar
                            </template>
                          </vs-tooltip>
                        </vs-button>
                      </center>
                    </vs-col>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 container" v-for="(tr,index_hijo) in tr.respuestas" :key="index_hijo">
                        <div class="card-head text-center">
                          Mayúscula - Minúscula
                        </div>
                      <div class="card estilodecard" :class="{'seleccionado':tr.status}" @click="seleccionar_letras(index, tr, index_hijo)">
                        <img :src="'archivos/imagenes/ejercicios/'+tr.valor+'.png'" class="w-100" style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
          <div class="container" style=";bottom: 12px;display: block;">
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviarletras()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
        </div>
        <!-- silabas -->
        <div class="tab-pane fade show mt-5" id="level" role="tabpanel" aria-labelledby="level-tab">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <div class="card mb-3 p-3" style="border-radius: 50px" v-for="(tr,index) in silabas.preguntas" :key="index">
                  <vs-row>
                    <vs-col vs-justify="flex-end">
                      <center>
                        <vs-button color="primary" style="postion: center" type="gradient" class="col-lg-4  p-3" @click.prevent="sonido(tr.audio)">
                          <vs-tooltip circl>
                            <i class="fas fa-volume-up fa-2x"></i>
                            <template #tooltip>
                              Escuchar
                            </template>
                          </vs-tooltip>
                        </vs-button>
                      </center>
                    </vs-col>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 container" v-for="(tr,index_h) in tr.respuestas" :key="index_h">
                        <div class="card-head text-center">
                          Mayúscula - Minúscula
                        </div>
                      <div class="card estilodecard" :class="{'seleccionado':tr.status}" @click="seleccionar_silabas(index, tr, index_h)">
                        <img :src="'archivos/imagenes/silabas/'+tr.valor+'.png'" class="w-100" style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
          <div class="container" style=";bottom: 12px;display: block;">
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviarsilabas()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
        </div>
        <!-- oraciones -->
        <div class="tab-pane fade show  mt-5" id="p" role="tabpanel" aria-labelledby="p-tab">
          <vs-row >
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-6 col-md-6 p-0" v-for="(tr,index) in oraciones.preguntas " :key="index">
              <div class="col-lg-12 mb-4">
                <div class="card m-3" style="border-radius: 50px">
                  <img :src="'archivos/imagenes/ima_ejer/'+tr.imagen+'.jpg'" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
                  <div class="card-body">
                    <vs-row>
                      <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 15px" >
                        <div class="card-head text-center" style="position: center;margin-bottom: 20px">
                          <h2><span>{{tr.oracion}}</span></h2>
                        </div>
                        <div class="center content-inputs">
                        <vs-input   color="#7d33ff" label-placeholder="Escribir" style="margin-bottom: 15px"/>
                        </div>
                      </vs-col>
                    </vs-row>
                  </div>
                </div>
              </div>
            </vs-col>
          </vs-row>
          <div>
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviaroraciones()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
        </div>
        {{variable_seleccionado}}
    </div>
  </div>
</template>

<script>
import Api from "../apis/Nivel2";

export default {
  data() {
    const axios = require("axios");
    return {
      letras:{
        preguntas:[
          {
            audio:"b",
            respuestas:[
              {id:1, valor:"b"},
              {id:2, valor:"d"}
            ]
          },
          {
            audio:"q",
            respuestas:[
              {id:3, valor:"p",},
              {id:4, valor:"q",}
            ]
          },
          {
            audio:"n",
            respuestas:[
              {id:5, valor:"m",},
              {id:6, valor:"n",}
            ]
          },
          {
            audio:"z",
            respuestas:[
              {id:7, valor:"s",},
              {id:8, valor:"z",}
            ]
          },
        ],
      },
      silabas:{
        preguntas:[
          {
            audio:"da",
            respuestas:[
              {id:1, valor:"add",},
              {id:2, valor:"da",}
            ]
          },
          {
            audio:"li",
            respuestas:[
              {id:3, valor:"li",},
              {id:4, valor:"ill",}
            ]
          },
          {
            audio:"om",
            respuestas:[
              {id:5, valor:"mmoo",},
              {id:6, valor:"om",}
            ]
          },
          {
            audio:"ne",
            respuestas:[
              {id:7, valor:"ne",},
              {id:8, valor:"eennn",}
            ]
          },
          {
            audio:"saaa",
            respuestas:[
              {id:9, valor:"saaa",},
              {id:10, valor:"as",}
            ]
          },
          {
            audio:"eerr",
            respuestas:[
              {id:11, valor:"re",},
              {id:12, valor:"eer",}
            ]
          },
          {
            audio:"rrii",
            respuestas:[
              {id:13, valor:"rrii",},
              {id:14, valor:"ir",}
            ]
          },
          {
            audio:"iip",
            respuestas:[
              {id:15, valor:"pi",},
              {id:16, valor:"iip",}
            ]
          },
          {
            audio:"di",
            respuestas:[
              {id:17, valor:"di",},
              {id:18, valor:"id",}
            ]
          },
          {
            audio:"pu",
            respuestas:[
              {id:19, valor:"uupp",},
              {id:20, valor:"pu",}
            ]
          },
        ],
      },
      oraciones:{
        preguntas:[
          {
            id:"1",
            imagen:"sombrero",
            oracion:"Misombreroesdecopa.",
            respuesta:"Mi sombrero es de copa"
          },
          {
            id:"2",
            imagen:"joven",
            oracion:"Borjatienepecas.",
            respuesta:"Borja tiene pecas"
          },
          {
            id:"3",
            imagen:"vaca",
            oracion:"Lavacatienecuernos.",
            respuesta:"La vaca tiene cuernos"
          },
          {
            id:"4",
            imagen:"pastel",
            oracion:"Pedroquierepastel.",
            respuesta:"Pedro quiere pastel"
          },
          {
            id:"5",
            imagen:"perro",
            oracion:"Miperroladramucho.",
            respuesta:"Mi perro ladra mucho"
          },
          {
            id:"6",
            imagen:"compras",
            oracion:"Sofíavadecompras.",
            respuesta:"Sofía va de compras"
          },
          {
            id:"7",
            imagen:"manzano",
            oracion:"Albertotieneunmanzano.",
            respuesta:"Alberto tiene un manzano"
          },
          {
            id:"8",
            imagen:"raton",
            oracion:"ElratonPereztienemidiente.",
            respuesta:"El ratón Perez tiene mi diente"
          },
          {
            id:"9",
            imagen:"cerro",
            oracion:"Juancaminaporelcerro.",
            respuesta:"Juan camina por el cerro"
          },
          {
            id:"10",
            imagen:"playa",
            oracion:"Laplayaeshermosa",
            respuesta:"La playa es hermosa"
          },
        ]
      },
      value:"",
      seleccionado:null,  
      variable_seleccionado:[],
      lista: []
    };
  },
  methods: {
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
    },
    seleccionar_letras(index, tr, index_hijo){
      if(this.variable_seleccionado.length==0){
        this.letras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 

      this.letras.preguntas[index].respuestas.forEach(hijo => {
        hijo.status = false;
      });

      this.letras.preguntas[index].respuestas[index_hijo].status = true;
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_silabas(index, tr, index_h){
      if(this.variable_seleccionado.length==0){
        this.silabas.preguntas.forEach(el => {
          this.variable_seleccionado.push({})
        })
      }
      this.silabas.preguntas[index].respuestas.forEach(hijo => {
        hijo.status= false
      })
      this.silabas.preguntas[index].respuestas[index_h].status = true;
      this.variable_seleccionado.splice(index, 1, tr)
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
    enviaroraciones(){
      Api.enviaroraciones(this.variable_seleccionado).then( ({data}) => {
      }).catch( error => {
        console.log(error);
      });
    },
    // nivel(){
    //   Api.llamardatos().then(({data}) => {
    //     console.log(data);
    //   })
    // },
    listar(){
      axios.get("/api/llamardatos").then(({data}) => {
        console.log(data)
        // this.lista = data;
      })
    }
  },
  mounted() {
    //this.llamarpreguntas();
    this.listar();
  },
};
</script>
<style>
  .estilodecard{
    border-radius: 50px;
    cursor:pointer;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .estilodecard:hover{
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
    -moz-transform: scale(1.01);
    -webkit-transform: scale(1.01);
    -o-transform: scale(1.01);
    -ms-transform: scale(1.01);
    transform: scale(1.01);
  }
  .seleccionado{
    border: 2px solid #195bff;
  }
  
</style>