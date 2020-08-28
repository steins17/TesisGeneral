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
                  <div v-for="(tr,index_hijo) in tr.respuestas" :key="index_hijo">
                    <vs-input color="#195bff" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_letras(index, tr, index_hijo)"></vs-input>
                  </div>
                </vs-row>
              </div>
            </div>
          </div>
        </vs-col>
      </vs-row>
      <div class="content-inputs " >
        <vs-button color="primary"  style="width: 100px;height: 100px;" type="gradient">
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
                    <vs-input color="#195bff" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_silabas(index, tr, index_h)"/>
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
                    <vs-input color="#195bff" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_palabras(index, tr, index_hi)"/>
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
<script>
import Api from "../apis/Nivel3";
export default {
  data(){
    return{
      letras:{
        preguntas:[],
      },
      silabas:{
        preguntas:[]
      },
      palabras:{
        preguntas:[]
      },
      
      variable_seleccionado:[],
    }
  },
  methods:{
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        var valores = [ {letras:0,valor:0}, {silabas:0,valor:0}, {palabras:0,valor:0} ];
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1) this.letras.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2) this.silabas.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==3) this.palabras.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach(pr => {
            if(el.id==pr.id_subnivel && el.subnivel==1){
              if(index!=valores[0].letras) valores[0].letras = index, valores[0].valor++;
              if(!this.letras.preguntas[valores[0].valor].respuestas) this.letras.preguntas[valores[0].valor].respuestas = [];
              this.letras.preguntas[valores[0].valor].respuestas.push(pr);
            };
            if(el.id==pr.id_subnivel && el.subnivel==2){  
              if(index!=valores[1].silabas) valores[1].silabas = index, valores[1].valor++;
              if(!this.silabas.preguntas[valores[1].valor-1].respuestas) this.silabas.preguntas[valores[1].valor-1].respuestas = [];
              this.silabas.preguntas[valores[1].valor-1].respuestas.push(pr); 
            }
            if(el.id==pr.id_subnivel && el.subnivel==3){  
              if(index!=valores[2].palabras) valores[2].palabras = index, valores[2].valor++;
              if(!this.palabras.preguntas[valores[2].valor-1].respuestas) this.palabras.preguntas[valores[2].valor-1].respuestas = [];
              this.palabras.preguntas[valores[2].valor-1].respuestas.push(pr); 
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
        this.palabras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.palabras.preguntas[index].respuestas[index_hi];
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