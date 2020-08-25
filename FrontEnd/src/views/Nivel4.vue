<template>
<div>
  <ul class="nav nav-tabs" id="mytab3" role="tablist3">
    <li class="nav-item col-lg-6 text-center">
      <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="uno" aria-selected="true" style="border-radius: 50px">ORACIONES</a>
    </li>
    <li class="nav-item col-lg-6 text-center">
      <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="dos" aria-selected="false" style="border-radius: 50px">FRASES</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent2">
    <!-- oraciones -->
    <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" v-for="(tr,index) in oraciones.preguntas" :key="index">
          <div class="card m-3" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 30px">
                <div class="card-head text-center" style="margin-bottom: 12px">
                  <h2><span>{{tr.nombre}}</span></h2>
                </div>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="6">
                <div class="center content-inputs" v-for="(tr,index_hijo) in tr.respuestas" :key="index_hijo">
                  <vs-input color="#195bff" disabled v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5" placeholder="Escribir" style="margin-bottom: 35px" @click="seleccionar_oraciones(index, tr, index_hijo)"/>
                </div>
                <div class="container" style=";display: block;">
                  <vs-button  style="float: right;margin-right: 80px;margin-bottom: 20px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;">
                    <vs-tooltip circle>
                      <i class="fas fa-microphone-alt fa-2x"></i>
                      <template #tooltip>
                        Hablar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </div>
              </vs-col>
            </vs-row>
          </div>     
        </vs-col>
      </vs-row>
      {{variable_seleccionado}}
    </div>
    <!-- frases -->
    <div  class="tab-pane fade show mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" v-for="(tr,index) in frases.preguntas" :key="index">
          <div class="card m-3" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 30px">
                <div class="card-head text-center" style="margin-bottom: 12px">
                  <h2><span>{{tr.nombre}}</span></h2>
                </div>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="6">
                <div class="center content-inputs" v-for="(tr,index_h) in tr.respuestas" :key="index_h">
                  <vs-input color="#195bff" disabled v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 35px" @click="seleccionar_frases(index, tr, index_h)"/>
                </div>
                <div class="container" style="bottom: 0px;display: block;">
                  <vs-button  style="float: right;margin-right: 80px;margin-bottom: 20px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;">
                    <vs-tooltip circle>
                      <i class="fas fa-microphone-alt fa-2x"></i>
                      <template #tooltip>
                        Hablar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </div>
              </vs-col>
            </vs-row>
          </div>     
        </vs-col>
      </vs-row>
      {{variable_seleccionado}}
    </div>
  </div>
</div>
</template>

<script>
import Api from "../apis/Nivel4";
export default {
  data() {
    return {
      oraciones:{
        preguntas:[
          {
            nombre:"Yo abrí la boca para que el odontólogo la revisara.",
            respuestas:[
              {
                nombre: "Yo abrí la boca para que el odontólogo la revisara."
              }
            ]
          },
          {
            nombre:"Bárbara bendita, eres mujer entre las santas.",
            respuestas:[
              {
                nombre: "Bárbara bendita, eres mujer entre las santas."
              }
            ]
          },
          {
            nombre:"La Barbacoa estaba deliciosa.",
            respuestas:[
              {
                nombre: "La Barbacoa estaba deliciosa."
              }
            ]
          },
          {
            nombre:"La rosa es roja.",
            respuestas:[
              {
                nombre: "La rosa es roja."
              }
            ]
          },
          {
            nombre:"El pan es de Natalia.",
            respuestas:[
              {
                nombre: "El pan es de Natalia."
              }
            ]
          },
          {
            nombre:"Yo repaso un rato.",
            respuestas:[
              {
                nombre: "Yo repaso un rato."
              }
            ]
          },
          {
            nombre:"Zapatero a su zapato.",
            respuestas:[
              {
                nombre: "Zapatero a su zapato."
              }
            ]
          },
          {
            nombre:"Mi mamá me ama.",
            respuestas:[
              {
                nombre: "Mi mamá me ama."
              }
            ]
          },
        ]
      },
      frases:{
        preguntas:[
          {
            nombre:"En la casa de la señora sofía, a la sombra de un peral me comí un pastel. Por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tía.",
            respuestas:[
              {
                nombre: "En la casa de la señora sofía, a la sombra de un peral me comí un pastel. Por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tía."
              }
            ]
          },
          {
            nombre:"Lola es la hermana de Sara. Lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva Lola se pone sus botas, su abrigo, sus orejeras y sale a jugar.",
            respuestas:[
              {
                nombre: "Lola es la hermana de Sara. Lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva Lola se pone sus botas, su abrigo, sus orejeras y sale a jugar."
              }
            ]
          },
          {
            nombre:"La gallina roja vive en una granja, ella trabaja mucho, siembra y cosecha el trigo. Ella hace un pan muy rico. Cuando acaba su trabajo ella se come todo el pan.",
            respuestas:[
              {
                nombre: "La gallina roja vive en una granja, ella trabaja mucho, siembra y cosecha el trigo. Ella hace un pan muy rico. Cuando acaba su trabajo ella se come todo el pan."
              }
            ]
          },
          {
            nombre:"Carlos es un mono muy divertido, le gusta comer bananas todo el día. A carlos le gusta ser perezoso y hacer reir a sus amigos.",
            respuestas:[
              {
                nombre: "Carlos es un mono muy divertido, le gusta comer bananas todo el día. A carlos le gusta ser perezoso y hacer reir a sus amigos."
              }
            ]
          },
          {
            nombre:"Miguel le gusta la playa, a Miguel lee muchas horas. Cuando viaja miguel a la playa siempre lo acompañan sus libros.",
            respuestas:[
              {
                nombre: "Miguel le gusta la playa, a Miguel lee muchas horas. Cuando viaja miguel a la playa siempre lo acompañan sus libros."
              }
            ]
          },
        ]
      },
      value:"",
      variable_seleccionado:[],
    }
  },
  methods: {
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1) this.letras.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2) this.silabas.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==3) this.oraciones.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach(pr => {
            if(el.id==pr.id_subnivel && el.subnivel==1){  
              if(!this.letras.preguntas[index].respuestas) this.letras.preguntas[index].respuestas = [];
              this.letras.preguntas[index].respuestas.push(pr); 
            }
            if(el.id==pr.id_subnivel && el.subnivel==2){  
              if(!this.silabas.preguntas[index].respuestas) this.silabas.preguntas[index].respuestas = [];
              this.silabas.preguntas[index].respuestas.push(pr); 
            }
            if(el.id==pr.id_subnivel && el.subnivel==3){  
              if(!this.oraciones.preguntas[index].respuestas) this.oraciones.preguntas[index].respuestas = [];
              this.oraciones.preguntas[index].respuestas.push(pr); 
            }
          });
        });
      });
    },
    seleccionar_oraciones(index, tr, index_hijo){
      if(this.variable_seleccionado.length==0){
        this.oraciones.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.oraciones.preguntas[index].respuestas[index_hijo];
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_frases(index, tr, index_h){
      if(this.variable_seleccionado.length==0){
        this.frases.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.frases.preguntas[index].respuestas[index_h];
      this.variable_seleccionado.splice(index,1,tr);
    },
    enviaroraciones(){
      Api.enviaroraciones(this.variable_seleccionado).then( ({data}) => {
        // console.log(data);
      }).catch( error => {
        console.log(error);
      });
    },
    enviarfrases(){
      Api.enviarfrases(this.variable_seleccionado).then( ({data}) => {
        // console.log(data);
      }).catch( error => {
        console.log(error);
      });
    },
  }
}
</script>

<style>
  .w-100 input{
    width: 100%!important;
  }
  
</style>