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
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 container" v-for="(tr,index) in tr.respuestas" :key="index">
                        <div class="card-head text-center">
                          Mayúscula - Minúscula
                        </div>
                      <div class="card" style="border-radius: 50px">
                        <img :src="'archivos/imagenes/ejercicios/'+tr.valor+'.png'" class="w-100" style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
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
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 container" v-for="(tr,index) in tr.respuestas" :key="index">
                        <div class="card-head text-center">
                          Mayúscula - Minúscula
                        </div>
                      <div class="card" style="border-radius: 50px">
                        <img :src="'archivos/imagenes/silabas/'+tr.valor+'.png'" class="w-100" style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
        </div>
        <!-- oraciones -->
        <div class="tab-pane fade show  mt-5" id="p" role="tabpanel" aria-labelledby="p-tab">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
              <div class="card m-3 p-3" style="border-radius: 50px" v-for="(tr,index) in oraciones.preguntas" :key="index">
                  <vs-row>
                        <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 15px">
                            <div class="card-head text-center" style="position: center;margin-bottom: 12px">
                              <h2><span>{{tr.oracion}}</span></h2>
                            </div>
                        </vs-col>
                        <vs-col vs-justify="flex" class="container" w="4">
                          <div class="center content-inputs" >
                            <vs-input state="success" placeholder="Escribir" style="float: right;margin-right: 125px;margin-bottom: 35px"></vs-input>
                          </div>
                          <div class="container" style="position:absolute;bottom: 12px;display: block;">
                            <vs-button  style="float: right;margin-right: 115px;margin-bottom: 6px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;" @click="active=1">
                              <vs-tooltip circle>
                                <i class="fas fa-check fa-2x"></i>
                                <template #tooltip>
                                  Verificar
                                </template>
                              </vs-tooltip>
                            </vs-button>
                          </div>
                        </vs-col>
                  </vs-row>
              </div>
            </vs-col>
          </vs-row>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      letras:{
        preguntas:[
          {
            audio:"b",
            respuestas:[
              {id:1, valor:"b",},
              {id:2, valor:"d",}
            ]
          },
          {
            audio:"q",
            respuestas:[
              {id:1, valor:"p",},
              {id:2, valor:"q",}
            ]
          },
          {
            audio:"n",
            respuestas:[
              {id:1, valor:"m",},
              {id:2, valor:"n",}
            ]
          },
          {
            audio:"z",
            respuestas:[
              {id:1, valor:"s",},
              {id:2, valor:"z",}
            ]
          },
        ],
      },
      silabas:{
        preguntas:[
          {
            audio:"da",
            respuestas:[
              {id:1, valor:"ad",},
              {id:2, valor:"da",}
            ]
          },
          {
            audio:"li",
            respuestas:[
              {id:1, valor:"li",},
              {id:2, valor:"il",}
            ]
          },
          {
            audio:"om",
            respuestas:[
              {id:1, valor:"mo",},
              {id:2, valor:"om",}
            ]
          },
          {
            audio:"ne",
            respuestas:[
              {id:1, valor:"ne",},
              {id:2, valor:"en",}
            ]
          },
        ],
      },
      oraciones:{
        preguntas:[
          {
            oracion:"Miperroladramucho"
          },
          {
            oracion:"Borjatienepecas"
          },
          {
            oracion:"Lavacatienecuernos"
          },
          {
            oracion:"Perdoquierepastel"
          },
          {
            oracion:"Misombreroesdecopa"
          },
        ]
      },
      value:"",
    };
  },
  methods: {
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
    }
  },
  mounted() {
    //this.llamarpreguntas();
  },
};
</script>