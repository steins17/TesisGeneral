<template>
<div>
  <div v-if="cargado">
    <div class="text-center centradv">
      <div class="preloader"></div>
    </div>
  </div>
  <div v-else>
    <ul class="nav nav-tabs" id="mytab2" role="tablist2">
      <li class="nav-item col-lg-4 text-center">
        <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="level3" aria-selected="true" style="border-radius: 50px">LETRAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel1 >= 7">
        <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="leve3" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel2 >= 7">
        <a class="nav-link " id="lev3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="lev3" aria-selected="false" style="border-radius: 50px">PALABRAS</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent2">
      <!-- letras -->
      <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
        <vs-row>
          <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel1 >= 7">
            <template #title>
              Calificación de la Unidad
            </template>
              Felicidades, obtuviste una calificación de {{resultados.subnivel1}}/10, ya puedes ingresar al Sílabas de este nivel
          </vs-alert>
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
          <vs-button color="primary"  style="float: right;margin-bottom: 20px;width: 100px;height: 100px;" type="gradient" @click="enviarletras()">
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
          <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel2 >= 7">
            <template #title>
              Calificación de la Unidad
            </template>
              Felicidades, obtuviste una calificación de {{resultados.subnivel2}}/10, ya puedes ingresar al Sílabas de este nivel
          </vs-alert>
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
          <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel3 >= 7">
            <template #title>
              Calificación de la Unidad
            </template>
              Felicidades, obtuviste una calificación de {{resultados.subnivel3}}/10, ya puedes ingresar al siguiente nivel
          </vs-alert>
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
  </div>
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
      resultados:{
        subnivel1:0,
        subnivel2:0,
        subnivel3:0
      },
      alerta: {
        active: true,
        time: 6000,
        progress: 0
      },
      cargado:true,
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
        this.cargado=false;
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
    enviarpalabras(){
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
      Api.enviarpalabras(this.variable_seleccionado).then( ({data}) => {
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
}
</script>

<style >
  .w-100 input{
    width: 100%!important;
  }
</style>