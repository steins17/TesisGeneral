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
                <div class="center content-inputs" v-for="(tr,index_hijo) in tr" :key="index_hijo">
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
                <div class="center content-inputs" v-for="(tr,index_h) in tr" :key="index_h">
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
        preguntas:[]
      },
      frases:{
        preguntas:[]
      },
      variable_seleccionado:[],
    }
  },
  methods: {
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1) this.oraciones.preguntas.push({nombre:el.nombre, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2) this.frases.preguntas.push({nombre:el.nombre, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach(pr => {
            if(el.id==pr.id_subnivel && el.subnivel==1){  
              if(!this.oraciones.preguntas[index].respuestas) this.oraciones.preguntas[index].respuestas = [];
              this.oraciones.preguntas[index].respuestas.push(pr); 
              if(el.id==pr.id_subnivel && el.subnivel==2){  
                if(!this.frases.preguntas[index].respuestas) this.frases.preguntas[index].respuestas = [];
                this.frases.preguntas[index].respuestas.push(pr); 
              }
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
  },
  mounted() {
    this.llamarpreguntas();
  },
}
</script>

<style>
  .w-100 input{
    width: 100%!important;
  }
  
</style>