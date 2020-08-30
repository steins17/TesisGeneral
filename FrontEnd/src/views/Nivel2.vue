<template> 
  <div>
      <ul class="nav nav-tabs" id="myTab1" role="tablist1">
        <li class="nav-item col-lg-4 text-center">
          <a class="nav-link active" id="level2-tab" data-toggle="tab" href="#level2" role="tab" aria-controls="level2" aria-selected="true" style="border-radius: 50px">LETRAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel1 >= 7">
          <a class="nav-link" id="level-tab" data-toggle="tab" href="#level" role="tab" aria-controls="level" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel2 >= 7">
          <a class="nav-link " id="p-tab" data-toggle="tab" href="#p" role="tab" aria-controls="p" aria-selected="false" style="border-radius: 50px">ORACIONES</a>
        </li>
      </ul> 
      <div class="tab-content" id="myTabContent1">
        <!-- Letras -->
        <div class="tab-pane fade show active mt-5" id="level2" role="tabpanel" aria-labelledby="level2-tab">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel1 >= 7">
                  <template #title>
                    Calificación de la Unidad
                  </template>
                    Felicidades, obtuviste una calificación de {{resultados.subnivel1}}/10, ya puedes ingresar al Sílabas de este nivel
                </vs-alert>
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
                      <div class="card estilodecard mb-3 p-3" :class="{'seleccionado':tr.status}" @click="seleccionar_letras(index, tr, index_hijo)">
                        <img :src="'archivos/imagenes/ejercicios/'+tr.foto" class="w-100" style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
          <div class="container" style="bottom: 12px;display: block;">
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviarletras()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
          <h1 style="display:none;">{{variable_seleccionado}}</h1>
        </div>
        <!-- silabas -->
        <div class="tab-pane fade show mt-5" id="level" role="tabpanel" aria-labelledby="level-tab" v-if="resultados.subnivel1 >= 7">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel2 >= 7">
                  <template #title>
                    Calificación de la Unidad
                  </template>
                    Felicidades, obtuviste una calificación de {{resultados.subnivel2}}/10, ya puedes ingresar a Oraciones de este nivel
                </vs-alert>
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
                      <div class="card estilodecard estilocard mb-3 p-3" :class="{'seleccionado':tr.status}" @click="seleccionar_silabas(index, tr, index_h)">
                        <img :src="'archivos/imagenes/silabas/'+tr.foto" class="w-100 " style="border-radius: 50px"/>
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
        <div class="tab-pane fade show  mt-5" id="p" role="tabpanel" aria-labelledby="p-tab" v-if="resultados.subnivel2 >= 7">
          <vs-row >
            <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel3 >= 7">
              <template #title>
                Calificación de la Unidad
              </template>
                Felicidades, obtuviste una calificación de {{resultados.subnivel3}}/10, ya puedes ingresar al siguiente nivel
            </vs-alert>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-6 col-md-6 p-3" v-for="(tr,index) in oraciones.preguntas " :key="index">
              <div class="col-lg-12 mb-4">
                <div class="card card-ajuste mb-3 p-3" style="border-radius: 50px">
                  <img :src="'archivos/imagenes/ima_ejer/'+tr.foto" class="card-img-top " style="border-radius: 50px"  alt="Card image cap"/>
                  <div class="card-body">
                    <vs-row>
                      <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 15px">
                        <div class="card-head text-center" style="position: center;margin-bottom: 20px">
                          <h2><span>{{tr.nombre}}</span></h2>
                        </div>
                        <div class="center content-inputs" v-for="(tr,index_2) in tr.respuestas" :key="index_2">
                        <vs-input color="#195bff" v-model="tr.respuesta_campo" label-placeholder="Escribir" class="w-100 mb-3 mt-5" @keyup="selec_oraciones(index, tr, index_2)"/>
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
        <h1 style="display:none;">{{variable_seleccionado}}</h1>
    </div>
  </div>
</template>

<script>
import Api from "../apis/Nivel2";

export default {
  data() {
    return {
      letras:{
        preguntas:[],
      },
      silabas:{
        preguntas:[],
      },
      oraciones:{
        preguntas:[],
      },
      seleccionado:null,  
      variable_seleccionado:[],
      resultados:{
        subnivel1:0,
        subnivel2:0,
        subnivel3:0
      },
      alerta: {
        active: true,
        time: 6000,
        progress: 0
      }
    };
  },
  methods: {
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        var valores = [ {letras:0,valor:0}, {silabas:0,valor:0}, {oraciones:0,valor:0} ];
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1) this.letras.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2) this.silabas.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==3) this.oraciones.preguntas.push({nombre:el.nombre,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach((pr,index1) => {
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
              if(index!=valores[2].oraciones) valores[2].oraciones = index, valores[2].valor++;
              if(!this.oraciones.preguntas[valores[2].valor-1].respuestas) this.oraciones.preguntas[valores[2].valor-1].respuestas = [];
              this.oraciones.preguntas[valores[2].valor-1].respuestas.push(pr); 
            }
          });
        });
      });
    },
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
    selec_oraciones(index, tr, index_2){
      if(this.variable_seleccionado.length==0){
        this.oraciones.preguntas.forEach(el => {
          this.variable_seleccionado.push({})
        })
      }
      this.oraciones.preguntas[index].respuestas[index_2];
      this.variable_seleccionado.splice(index,1,tr)
    },
    enviarletras(){
      if(this.variable_seleccionado.length<=0){
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'danger',
          title: 'Debes responder',
          text: 'Debes seleccionar una de las respuestas'
        });
      }
      for(var i=0; i<this.variable_seleccionado.length; i++){
        if($.isEmptyObject(this.variable_seleccionado[i])){
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Debes responder',
            text: 'Debes seleccionar una de las respuestas'
          });
          return;
        }
      }
      Api.enviarletras(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.resultados.subnivel1 = resultado;
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'primary',
          position:'top-center',
          title: `obtuviste un total de ${resultado}/10`,
          text: `obtuviste un total de ${data[0].suma} aciertos de ${data[0].total} preguntas`
        });
      }).catch( error => {
        console.log(error);
      });
    },
    enviarsilabas(){
      if(this.variable_seleccionado.length<=0){
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'danger',
          title: 'Debes responder',
          text: 'Debes seleccionar una de las respuestas'
        });
      }
      for(var i=0; i<this.variable_seleccionado.length; i++){
        if($.isEmptyObject(this.variable_seleccionado[i])){
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Debes responder',
            text: 'Debes seleccionar una de las respuestas'
          });
          return;
        }
      }
      Api.enviarsilabas(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.resultados.subnivel2 = resultado;
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'primary',
          position:'top-center',
          title: `obtuviste un total de ${resultado}/10`,
          text: `obtuviste un total de ${data[0].suma} aciertos de ${data[0].total} preguntas`
        });
      }).catch( error => {
        console.log(error);
      });
    },
    enviaroraciones(){
      if(this.variable_seleccionado.length<=0){
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'danger',
          title: 'Debes responder',
          text: 'Debes escribir la respuesta'
        });
      }
      for(var i=0; i<this.variable_seleccionado.length; i++){
        if($.isEmptyObject(this.variable_seleccionado[i])){
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Debes responder',
            text: 'Debes seleccionar una de las respuestas'
          });
          return;
        }
      }
      Api.enviaroraciones(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.resultados.subnivel3 = resultado;
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'primary',
          position:'top-center',
          title: `obtuviste un total de ${resultado}/10`,
          text: `obtuviste un total de ${data[0].suma} aciertos de ${data[0].total} preguntas`
        });
      }).catch( error => {
        console.log(error);
      });
    },
    llamarresultados(){
      Api.llamarresultados().then(({data}) =>{
        this.resultados = {
          subnivel1: (data.subnivel1[0].suma * 10) / data.subnivel1[0].total,
          subnivel2: (data.subnivel2[0].suma * 10) / data.subnivel2[0].total,
          subnivel3: (data.subnivel3[0].suma * 10) / data.subnivel3[0].total
        }
      });
    }
  },
  mounted() {
    this.llamarpreguntas();
    this.llamarresultados();
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
  .card-ajuste{
    display: block;
    text-align: center;
  }
  .card-ajuste img{
    width: 300px;
    height: 250px;
  }

  .estilocard img{
    width: 200px;
    height: 300px;
  }
  .w-100 input{
    width: 100%!important;
  }
</style>